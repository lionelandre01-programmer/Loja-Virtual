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
        Schema::create('encomendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->enum('estado',['pendente','entregue','reembolso','reembolsado','enviado'])->default('pendente');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('encomenda_items', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('encomenda_id');
            $table->unsignedBigInteger('produto_id');
            $table->integer('quantidade');
            $table->decimal('preco', 10, 2);
            $table->timestamps();

            $table->foreign('encomenda_id')->references('id')->on('encomendas')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encomendas');
        Schema::dropIfExists('encomenda_items');
    }
};
