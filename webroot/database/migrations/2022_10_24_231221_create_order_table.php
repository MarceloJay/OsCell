<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('client_id');
            $table->string('brand',20);
            $table->string('model',20);
            $table->string('serial_number',45)->unique();
            $table->boolean('device_status');
            $table->string('accessories');
            $table->boolean('repaired');
            $table->string('used');
            $table->string('defect_description')->nullable();
            $table->string('requested_service')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('client')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
