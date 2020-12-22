<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddressClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_client', function (Blueprint $table) {
            $table->unsignedBigInteger("client_id");
            $table->string("street");
            $table->string("neighborhood");
            $table->integer("number_house");
            $table->string("complements")->nullable();
            $table->string("city");
            $table->string("state", 3);
            $table->string("reference_point")->nullable();
            $table->boolean("favorite_like")->default(0);
            $table->timestamps();

            $table->foreign("client_id")->on("clients")->references("id")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_client');
    }
}
