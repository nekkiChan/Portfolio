<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('s003_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('所有者名');
            $table->string('profile_icon_path')->nullable()->comment('プロフィールアイコンパス');
            $table->string('favicon_icon_path')->nullable()->comment('サイトアイコンパス');
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
        Schema::dropIfExists('s003_owners');
    }
};
