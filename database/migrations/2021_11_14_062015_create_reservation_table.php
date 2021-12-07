<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('reservation_date');
            $table->unsignedBigInteger('day_trip_plan_id');
            $table->unsignedInteger('person');
            $table->unsignedInteger('status')->default(0);
            $table->foreign('day_trip_plan_id')->references('id')->on('day_trip_plan');            
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reservation');
    }
}
