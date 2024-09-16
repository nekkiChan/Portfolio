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
        Schema::create('s002_roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('権限名');
            $table->integer('level')->default(1)->comment('権限レベル');
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
        Schema::dropIfExists('s002_roles');
    }
};
