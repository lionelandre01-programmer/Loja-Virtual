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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->enum('name',
            ['camisa','blusa','calça','casaco','calçado','chinelo',
            'joia','mochila','carteira','chapeu','vestido','macacao']);
            $table->timestamps();

        });

        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price',10,2);
            $table->integer('quantity');
            $table->unsignedBigInteger('category');
            $table->enum('genero',['masculino','feminino']);
            $table->string('image');
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categorias')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
