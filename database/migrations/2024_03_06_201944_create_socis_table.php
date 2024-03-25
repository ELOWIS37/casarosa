<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('socis', function (Blueprint $table) {
            $table->string('Codi')->primary();
            $table->string('Cognoms');
            $table->string('Nom');
            $table->string('DNI')->unique();
            $table->string('Poblacio');
            $table->string('CodiPostal');
            $table->string('Adreca');
            $table->string('Telefon');
            $table->string('IBAN')->nullable();
            $table->string('MetodeDePagament');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socis');
    }
};
