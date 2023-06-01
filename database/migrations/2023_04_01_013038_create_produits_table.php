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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->bigInteger('prom_id');
            $table->string('produit_nom');
            $table->string('produit_prix');
            $table->tinyInteger('status');
            $table->tinyInteger('feature');
            $table->string('produit_quantite');
            $table->mediumText('produit_mini_description');
            $table->longText('produit_description');
            $table->string('produit_image');
            $table->string('produit_genre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
