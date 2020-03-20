<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigIncrements('owner_id');
            $table->bigIncrements('volunteer_id');
            $table->date('delivery_earliest_date');
            $table->date('delivery_latest_date');
            $table->time('delivery_from_time');
            $table->time('delivery_to_time');
            $table->time('delivery_location');
            $table->time('delivery_notes');
            $table->string('contact_phone_number');

            $table->smallInteger('status');

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('volunteer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppings');
    }
}
