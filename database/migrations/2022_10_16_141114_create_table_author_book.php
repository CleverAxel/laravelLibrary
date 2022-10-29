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
        Schema::create('author_book', function (Blueprint $table) {
            $table->integer("idAuthor")->unsigned()->nullable(true)->default(null);
            $table->integer("idBook")->unsigned()->nullable(true)->default(null);
            $table->foreign("idAuthor")->references("id")->on("author")->cascadeOnUpdate();
            $table->foreign("idBook")->references("id")->on("book")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author_book');
    }
};
