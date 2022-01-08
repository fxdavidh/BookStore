<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('author');
            $table->longText('synopsis');
            $table->string('cover');
            $table->string('file')->nullable();
            $table->integer('price');
            $table->unsignedBigInteger('storeId');
            $table->unsignedBigInteger('typeId');
            $table->foreign('storeId')->references('id')->on('stores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('typeId')->references('id')->on('types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('books');
    }
}
