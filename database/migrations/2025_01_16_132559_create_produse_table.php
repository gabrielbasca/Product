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
        Schema::create('produse', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('currency_id');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->timestamps();
        
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produse');
    }
};
