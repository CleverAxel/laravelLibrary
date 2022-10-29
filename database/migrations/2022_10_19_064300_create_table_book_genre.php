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
        Schema::create('book_genre', function (Blueprint $table) {
            $table->integer("idBook")->unsigned()->nullable(true)->default(null);
            $table->integer("idGenre")->unsigned()->nullable(true)->default(null);
            $table->foreign("idBook")->references("id")->on("book")->cascadeOnUpdate();
            $table->foreign("idGenre")->references("id")->on("genre")->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
    }
};
