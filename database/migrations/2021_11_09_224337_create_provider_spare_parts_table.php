<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderSparePartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_spare_parts', function (Blueprint $table) {
            $table->id();
            $table->integer('provider_id')->unsigned()->foreign('providers','id');
            $table->integer('spare_part_id')->unsigned()->foreign('spare_parts','id');
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
        Schema::dropIfExists('provider_spare_parts');
    }
}
