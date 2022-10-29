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
        Schema::create('book', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->string("title", 255)->nullable(false);
            $table->string("resume", 1000)->nullable(true)->default(null);
            $table->date("parution")->nullable(true)->default(null);
            $table->string("image")->nullable(true)->default(null);
            $table->integer("idEdition")->unsigned()->nullable(true)->default(null);
            $table->integer("idCollection")->unsigned()->nullable(true)->default(null);
            $table->integer("idStock")->unsigned()->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book');
    }
};
