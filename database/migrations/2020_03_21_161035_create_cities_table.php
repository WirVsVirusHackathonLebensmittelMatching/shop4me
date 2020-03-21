<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('country_code')->default('DE');
            $table->string('zip_code')->default('');
            $table->string('city_name')->default('');
            $table->string('state')->default('');
            $table->string('state_code')->default('');
            $table->string('province')->default('');
            $table->string('province_code')->default('');
            $table->decimal('lat', 10, 8)->nullable()->default(0);
            $table->decimal('lng', 11, 8)->nullable()->default(0);
            $table->unsignedBigInteger('owner_id')->nullable();

            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
