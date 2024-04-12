<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("clinic_id");
            $table->string("day_of_week");
            $table->time("opening_hour")->default("10:00:00")->nullable();
            $table->time("closing_hour")->default("19:00:00")->nullable();
            $table->boolean("is_holiday")->default(0)->nullable();
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
        Schema::dropIfExists('clinic_times');
    }
};
