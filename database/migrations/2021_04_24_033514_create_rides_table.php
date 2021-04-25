<?php

use App\Enums\RideStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->dateTime('travel_start_time');
            $table->string('origin_address');
            $table->string('origin_coordinate')->nullable();
            $table->string('destination_address');
            $table->string('destination_coordinate')->nullable();
            $table->integer('distance');
            $table->integer('seats_offered');
            $table->integer('seats_available');
            $table->integer('contribution_per_head');
            $table->integer('status')->default(RideStatus::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rides');
    }
}
