<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("users_permissions", function (Blueprint $table){
           $table->unsignedBigInteger("user_id");
           $table->unsignedBigInteger("permission_id");

           $table->timestamps();
           $table->foreign("user_id")
                 ->on("users")
                 ->references("id");

            $table->foreign("permission_id")
                ->on("permissions")
                ->references("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
