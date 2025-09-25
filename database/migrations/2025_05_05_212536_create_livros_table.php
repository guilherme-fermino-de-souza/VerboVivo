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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('autor');
            $table->string('idioma');
            $table->string('paisorigem');
            $table->integer('anolancamento');
            $table->decimal('preco', 8, 2);
            $table->integer('quantidade');
            $table->string('tipo_image');
            $table->string('image')->nullable(); //Img
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
