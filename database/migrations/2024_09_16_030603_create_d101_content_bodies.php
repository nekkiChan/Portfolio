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
        Schema::create('d101_content_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('コンテンツボディ名');
            $table->string('title', 100)->comment('タイトル');
            $table->text('body')->nullable()->comment('内容');
            $table->integer('sort')->comment('並び順');
            $table->boolean('is_admin')->default(false)->comment('認証表示');
            $table->integer('content_subcategory_id')->nullable()->comment('コンテンツサブカテゴリID');
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
        Schema::dropIfExists('d101_content_bodies');
    }
};
