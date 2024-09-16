<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // テーブルが既に存在していない場合のみリネーム
        if (!Schema::hasTable('s001_users')) {
            Schema::rename('users', 's001_users');
        }

        // s001_usersテーブルのカラムを変更
        Schema::table('s001_users', function (Blueprint $table) {
            // 既存のカラムを削除 (存在する場合のみ)
            if (Schema::hasColumn('s001_users', 'id')) {
                $table->dropColumn('id');
            }
            if (Schema::hasColumn('s001_users', 'name')) {
                $table->dropColumn('name');
            }
            if (Schema::hasColumn('s001_users', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('s001_users', 'email_verified_at')) {
                $table->dropColumn('email_verified_at');
            }
            if (Schema::hasColumn('s001_users', 'password')) {
                $table->dropColumn('password');
            }
            if (Schema::hasColumn('s001_users', 'created_at')) {
                $table->dropColumn('created_at');
            }
            if (Schema::hasColumn('s001_users', 'updated_at')) {
                $table->dropColumn('updated_at');
            }

            // 新しいカラムを追加
            $table->id();
            $table->string('name')->comment('ユーザー名');
            $table->string('email')->nullable()->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('パスワード');
            $table->integer('role_id')->default(1)->comment('権限ID');
            $table->boolean('is_disable')->default(false)->comment('無効化フラグ');
            $table->boolean('is_delete')->default(false)->comment('削除フラグ');
            $table->timestamp('created_at')->useCurrent()->comment('作成日');
            $table->integer('created_by')->nullable()->comment('作成者');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
            $table->integer('updated_by')->nullable()->comment('更新者');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 追加したカラムを削除 (存在する場合のみ)
        Schema::table('s001_users', function (Blueprint $table) {
            if (Schema::hasColumn('s001_users', 'role_id')) {
                $table->dropColumn('role_id');
            }
            if (Schema::hasColumn('s001_users', 'is_disable')) {
                $table->dropColumn('is_disable');
            }
            if (Schema::hasColumn('s001_users', 'is_delete')) {
                $table->dropColumn('is_delete');
            }
            if (Schema::hasColumn('s001_users', 'created_by')) {
                $table->dropColumn('created_by');
            }
            if (Schema::hasColumn('s001_users', 'updated_by')) {
                $table->dropColumn('updated_by');
            }

            // 必要に応じて以前のカラムを元に戻す
            if (!Schema::hasColumn('s001_users', 'name')) {
                $table->string('name')->nullable();
            }
            if (!Schema::hasColumn('s001_users', 'email')) {
                $table->string('email')->nullable()->unique();
            }
            if (!Schema::hasColumn('s001_users', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable();
            }
            if (!Schema::hasColumn('s001_users', 'password')) {
                $table->string('password');
            }
            if (!Schema::hasColumn('s001_users', 'created_at')) {
                $table->timestamps(); // created_at と updated_at を再度追加
            }
        });

        // テーブル名を元に戻す (もし存在すれば)
        if (Schema::hasTable('s001_users')) {
            Schema::rename('s001_users', 'users');
        }
    }
};
