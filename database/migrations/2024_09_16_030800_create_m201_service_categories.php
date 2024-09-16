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
        Schema::create('m201_service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('サービス名');
            $table->string('view', 100)->comment('表示名');
            $table->string('icon_image_path', 100)->nullable()->comment('アイコン画像パス');
            $table->integer('sort')->comment('並び順');
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
        Schema::dropIfExists('m201_service_categories');
    }
};
