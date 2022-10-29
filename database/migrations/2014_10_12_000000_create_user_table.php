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
        Schema::create('user', function (Blueprint $table) {
            $table->increments("id")->unsigned();
            $table->string("username", 128)->nullable(false);
            $table->string("email", 255)->nullable(false)->unique();
            $table->string("password", 128)->nullable(false);
            $table->string("remember_me", 128)->nullable(true)->default(null)->unique();
            $table->string("image", 255)->nullable(true)->default(null);
            $table->boolean("isAdmin")->nullable(false)->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
