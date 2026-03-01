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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable(); //Vai dizer se é produto, usuário, encomendas...
            $table->unsignedBigInteger('user_id'); //O responsável pelo movimento
            $table->string('objecto'); //O objecto do movimento.
            $table->integer('codigo'); //Id do objecto.
            $table->integer('quantidade')->default(1);
            $table->string('movimento');
            $table->text('nota')->nullable();//O motivo do movimento
            $table->string('update')->nullable();//O que foi alterado
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentos');
    }
};
