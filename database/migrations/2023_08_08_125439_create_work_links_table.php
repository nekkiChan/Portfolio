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
        Schema::create('work_links', function (Blueprint $table) {
            $table->id();
            $table->string('status', 20)->default('active')->index();
            $table->integer('work_id')->index();
            $table->string('link_url', 254)->index();
            $table->string('link_name', 50)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_links');
    }
};
