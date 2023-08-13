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
        Schema::create('information_images', function (Blueprint $table) {
            $table->id();
            $table->string('status', 20)->default('active')->index();
            $table->integer('information_id')->index();
            $table->string('image_name',100)->index();
            $table->text('comment')->nullable()->default(Null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('information_images');
    }
};
