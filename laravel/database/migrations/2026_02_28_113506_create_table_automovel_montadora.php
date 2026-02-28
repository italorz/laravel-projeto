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
        Schema::create('montadoras', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('automoveis', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('placa')->unique('A placa ja existe');
            $table->string('chassi')->unique('O chassi ja existe');
            $table->foreignId('montadora_id')->constrained('montadoras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automoveis');
        Schema::dropIfExists('montadoras');
    }
};
