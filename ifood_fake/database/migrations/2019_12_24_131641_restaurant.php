<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Restaurant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("restaurants", function (Blueprint $table){
            $table->id("cnpj");
            $table->string("image");
            $table->string("name")->unique();
            $table->string("phone", 14);
            $table->boolean("status_operating")->default(0);
            $table->float("note", 10, 2)->default(0.00);
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
        Schema::dropIfExists("restaurants");
    }
}
