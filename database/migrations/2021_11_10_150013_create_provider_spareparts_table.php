<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderSparepartsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_spareparts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('spare_part_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('spare_part_id')->references('id')->on('spare_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('provider_spareparts');
    }
}
