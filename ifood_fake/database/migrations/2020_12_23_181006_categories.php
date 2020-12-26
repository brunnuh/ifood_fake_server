<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("user_id");
            $table->string("photo")->nullable();
            $table->string("name")->unique();
            $table->string("description")->default("descricão da categoria");
            $table->timestamps();

            $table->foreign("user_id")->on("users")
                                              ->references("id")
                                              ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("categories");
    }
}
