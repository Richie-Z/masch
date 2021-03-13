<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Studios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('studios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('branch_id');
            $table->decimal('basic_price',13,2);
            $table->decimal('aditional_friday_price',13,2);
            $table->decimal('aditional_saturday_price',13,2);
            $table->decimal('aditional_sunday_price',13,2);
            $table->timestamps();
            $table->index(['branch_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studios');
    }
}
