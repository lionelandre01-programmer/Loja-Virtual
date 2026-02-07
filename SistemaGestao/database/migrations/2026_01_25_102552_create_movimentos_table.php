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
            $table->string('encomenda_id')->nullable();
            $table->string('produto_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('objecto');
            $table->integer('codigo')->nullable();
            $table->integer('quantidade')->default(1);
            $table->string('movimento');
            $table->text('descricao')->nullable();
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
