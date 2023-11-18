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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')
                  ->references('id')
                  ->on('commandes')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                        ->references('id')
                        ->on('products')
                        ->onDelete('cascade');
            $table->integer('quantite');
            $table->float('total'); 
            $table->integer('categorie_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
