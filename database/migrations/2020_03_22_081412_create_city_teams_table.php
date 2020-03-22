<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityTeamsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('hotline')->nullable();
            $table->string('team_email')->unique()->nullable();
            $table->mediumText('description')->nullable();
            $table->unsignedBigInteger('main_contact_id')->nullable();
            $table->smallInteger('status')->default(0);
            $table->foreign('main_contact_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_teams');
    }
}
