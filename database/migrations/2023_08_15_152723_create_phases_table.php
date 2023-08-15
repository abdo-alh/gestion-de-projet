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
        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('duree');
            $table->date('date_de_debut');
            $table->date('date_de_fin');
            $table->string('statut');
            $table->string('matriculation');
            $table->string('reference');
            $table->foreign('matriculation')->references('matriculation')->on('users')->onDelete('cascade');
            $table->foreign('reference')->references('reference')->on('projets')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phases');
    }
};
