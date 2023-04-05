<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 255)->nullable(false);
            $table->foreignId('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategoris');
            $table->integer('harga')->nullable(false);
            $table->text('deskripsi')->nullable(false);
            $table->string('foto',255)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
