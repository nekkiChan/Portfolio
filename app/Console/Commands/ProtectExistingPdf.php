<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use setasign\Fpdi\Tcpdf\Fpdi;

class ProtectExistingPdf extends Command
{
    // コマンドのシグネチャ (実行するコマンド名)
    protected $signature = 'pdf:protect {input_path} {output_path} {user_password} {owner_password}';

    // コマンドの説明
    protected $description = 'Apply a password to an existing PDF file';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // コマンドライン引数を取得
        $inputFilePath = storage_path("app/public/uploads/files/exports/{$this->argument('input_path')}");  // 読み込むPDFファイルのパス
        $outputFilePath = storage_path("app/public/uploads/files/exports/{$this->argument('output_path')}"); // 保存先のパス
        $userPassword = $this->argument('user_password'); // ユーザーパスワード
        $ownerPassword = $this->argument('owner_password'); // オーナーパスワード

        // PDFの読み込み
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($inputFilePath);

        // 各ページを追加
        for ($i = 1; $i <= $pageCount; $i++) {
            $tplIdx = $pdf->importPage($i);
            $pdf->AddPage();
            $pdf->useTemplate($tplIdx);
        }

        // パスワード保護を設定
        $permissions = array('print'); // 許可する操作を指定（例: 'print', 'copy' など）
        $pdf->SetProtection($permissions, $userPassword, $ownerPassword);

        // ファイルパスに保存
        $pdf->Output($outputFilePath, 'F');

        // 成功メッセージを表示
        $this->info('Password-protected PDF has been generated: ' . $outputFilePath);
    }
}
