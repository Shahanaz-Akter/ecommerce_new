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
        // unit_type', 'base_unit_name','symbol', 'unit_conversion
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_type')->nullable();
            $table->string('base_unit_name')->nullable();
            $table->string('symbol')->nullable();
            $table->string('unit_conversion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
