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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Krátký název projektu pro hlavní stránku
            $table->string('full_title');  // Plný název projektu pro detail
            $table->string('location')->nullable();  // Místo projektu
            $table->string('author')->nullable();  // Autor projektu
            $table->string('phase')->nullable();  // Fáze projektu (nepovinné)
            $table->string('rating')->nullable();  // Hodnocení projektu (nepovinné)
            $table->string('project_type')->nullable();  // Typ projektu
            $table->string('supervisor')->nullable();  // Vedoucí práce (nepovinné)
            $table->string('proposal')->nullable();  // Návrh (nepovinné)
            $table->string('implementation')->nullable();  // Realizace (nepovinné)
            $table->text('annotation')->nullable();  // Anotace projektu
            $table->text('description')->nullable();  // Popis projektu (nepovinné)
            $table->string('scope_of_work')->nullable();  // Rozsah prací (nepovinné)
            $table->date('date')->nullable();  // Datum projektu
            $table->string('cover_image');  // Úvodní fotka projektu
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
