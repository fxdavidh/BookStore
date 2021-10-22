<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book__genres', function (Blueprint $table) {
            $table->unsignedBigInteger('bookId');
            $table->unsignedBigInteger('genreId');
            $table->foreign('bookId')->references('id')->on('books')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('genreId')->references('id')->on('genres')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('book__genres');
    }
}
