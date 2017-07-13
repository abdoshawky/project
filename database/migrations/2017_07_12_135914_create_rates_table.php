<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('account');
            $table->integer('ad_id')->unsigned();
            $table->foreign('ad_id')->references('id')->on('ads');
            $table->boolean('commitment')->default(0);
            $table->boolean('prices')->default(0);
            $table->boolean('quality')->default(0);
            $table->boolean('accurity')->default(0);
            $table->boolean('honesty')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('rates');
    }
}
