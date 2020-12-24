<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("products", function (Blueprint $table){
           $table->id("id");
           $table->unsignedBigInteger("restaurant_cnpj");
           $table->unsignedBigInteger("category_id");
           $table->string("image")->nullable();
           $table->string("name")->unique();
           $table->string("description");
           $table->integer("amount_person")->default(1);
           $table->float("price", 10, 2);
           $table->timestamps();

           $table->foreign("restaurant_cnpj")
                        ->on("restaurants")
                        ->references("cnpj")
                        ->onDelete("cascade");

            $table->foreign("category_id")
                ->on("categories")
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
        Schema::dropIfExists("products");
    }
}
