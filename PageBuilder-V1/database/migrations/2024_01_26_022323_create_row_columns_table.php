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
        Schema::create('row_columns', function (Blueprint $table) {
            $table->tinyInteger('order')->default(0);
            $table->foreignId('row_id')->constrained('rows');
            $table->foreignId('column_id')->constrained('columns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('row_columns');
    }
};
