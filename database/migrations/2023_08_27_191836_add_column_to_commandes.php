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
        Schema::table('commandes', function (Blueprint $table) {
            $table->enum('payment',['1','2']);
            $table->enum('livraison',['1','2']);
            $table->enum('statut',['1','2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commandes', function (Blueprint $table) {
            //
        });
    }
};
