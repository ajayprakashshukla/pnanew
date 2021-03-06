<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('secondary_email')->nullable();
            $table->integer('mobile_no')->default('0');
            $table->integer('mobile_no_country')->default('0');
            $table->integer('office_extension')->default('0');
            $table->integer('office_extension_country')->default('0');
            $table->string('next_of_kin')->nullable();
            $table->string('relationship_with_next_of_kin')->nullable();
            $table->integer('next_of_kin_phone_number')->default('0');
            $table->integer('next_of_kin_phone_number_country')->default('0');
            $table->string('address')->nullable();
            $table->string('city_town')->nullable();
            $table->string('country')->nullable();
            $table->string('password')->nullable();
            $table->integer('role')->default(3);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
