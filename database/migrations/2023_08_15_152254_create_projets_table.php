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
        Schema::create('projets', function (Blueprint $table) {
            $table->string('reference')->primary();
            $table->string('titre');
            $table->float('budget');
            $table->integer('periodeestimeee');
            $table->date('datedebut');
            $table->date('datefin');
            $table->string('matriculation');
            $table->foreign('matriculation')->references('matriculation')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
