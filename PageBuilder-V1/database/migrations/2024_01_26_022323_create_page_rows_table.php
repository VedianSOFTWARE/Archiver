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
        Schema::create('page_rows', function (Blueprint $table) {
            $table->tinyInteger('order')->default(0);
            $table->foreignId('page_id')->constrained('pages');
            $table->foreignId('row_id')->constrained('rows');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_rows');
    }
};
