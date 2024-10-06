<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class BackupDatabaseAndUploads extends Command
{
    protected $signature = 'backup:create';
    protected $description = 'Backup SQL and uploads directory into a password-protected ZIP file';

    public function handle()
    {
        // SQLダンプファイルの生成
        $sqlFile = storage_path('app/backup.sql');
        $this->createSqlDump($sqlFile);

        // ZIPファイル名の生成 (YYYYMMDD)
        $date = now()->format('Ymd');
        $zipFilePath = base_path("backup/{$date}.zip");

        // ZIPファイルの作成
        $zip = new ZipArchive;
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            // SQLファイルをZIPに追加
            $zip->addFile($sqlFile, 'backup.sql');

            // uploadsディレクトリをZIPに追加
            $this->addDirectoryToZip($zip, storage_path('app/public/uploads'), 'uploads');

            // ZIPファイルにパスワードを設定
            $password = config('environment.ZIP_PASS'); // 必要に応じて動的に設定
            $zip->setPassword($password);

            // 追加したファイルのリストを作成
            $filesToEncrypt = ['backup.sql'];
            $filesToEncrypt = array_merge($filesToEncrypt, $this->getAddedFiles($zip));

            // 全てのファイルに暗号化を適用
            foreach ($filesToEncrypt as $fileName) {
                $zip->setEncryptionName($fileName, ZipArchive::EM_AES_256);
            }

            // ZIPファイルを閉じる
            $zip->close();

            // SQLダンプファイルを削除
            unlink($sqlFile);

            // 古いバックアップファイルの削除
            $this->deleteOldBackups();
        } else {
            $this->error('Failed to create ZIP file.');
        }

        $this->info('Backup created successfully.');
    }

    protected function getAddedFiles($zip)
    {
        $addedFiles = [];
        // ZIPファイル内のファイル名を取得
        for ($i = 0; $i < $zip->numFiles; $i++) {
            $addedFiles[] = $zip->getNameIndex($i);
        }
        return $addedFiles;
    }


    protected function createSqlDump($sqlFile)
    {
        $dbHost = config('database.connections.mysql.host');
        $dbName = config('database.connections.mysql.database');
        $dbUser = config('database.connections.mysql.username');
        $dbPass = config('database.connections.mysql.password');

        // コマンドの作成
        $command = "mysqldump --host={$dbHost} --user={$dbUser} --password={$dbPass} {$dbName}";

        // 実行結果を確認するためにファイルにリダイレクト
        $command .= " > " . escapeshellarg($sqlFile) . " 2>&1"; // エラー出力を含める

        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('mysqldump failed: ' . implode("\n", $output));
            return false;
        } else {
            $this->info('mysqldump executed successfully: ' . implode("\n", $output));
        }

        return true;
    }

    protected function addDirectoryToZip($zip, $folderPath, $folderName)
    {
        if (!is_dir($folderPath)) {
            $this->error("Directory does not exist: {$folderPath}");
            return;
        }

        // ディレクトリ内のすべてのファイルとサブディレクトリを取得
        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($folderPath),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        // 追加するファイルが見つからない場合のメッセージ
        if (iterator_count($files) === 0) {
            $this->info("No files found in directory: {$folderPath}");
            return;
        }

        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath(); // 実際のファイルパス

                // 正しい相対パスを作成
                $relativePath = $folderName . '/' . str_replace('\\', '/', substr($filePath, strlen($folderPath) + 1));
                $this->info("Adding to ZIP: {$relativePath}");

                // ZIPにファイルを追加
                $zip->addFile($filePath, $relativePath);
            }
        }
    }

    protected function deleteOldBackups()
    {
        $backupDir = base_path('backup');
        $files = collect(Storage::disk('local')->files($backupDir))
            ->sortBy(function ($file) {
                return filemtime($file);
            })
            ->values();

        // 8個以上のZIPファイルが存在する場合は最古のものを削除
        if ($files->count() > 8) {
            foreach ($files->slice(0, $files->count() - 8) as $file) {
                unlink($backupDir . '/' . basename($file));
            }
        }
    }
}
