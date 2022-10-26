<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',45);
            $table->string('document',20)->unique();
            $table->string('email',30)->nullable();
            $table->string('phone',12);
            $table->string('address');
            $table->string('city',25);
            $table->string('state',2);
            $table->string('cep',12)->nullable();
            $table->string('contact',12)->nullable();
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
        Schema::dropIfExists('client');
    }
}
