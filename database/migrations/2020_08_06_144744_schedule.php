<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('movies_id');
            $table->unsignedInteger('studios_id');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->decimal('price',13,2);
            $table->timestamps();
            $table->index(['movies_id','studios_id']);
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
