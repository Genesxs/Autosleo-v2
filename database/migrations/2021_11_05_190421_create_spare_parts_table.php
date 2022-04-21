<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparePartsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spare_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500);
            $table->longText('description');
            $table->integer('unit_value');
            $table->string('image', 1000);
            $table->integer('quantity');
            $table->integer('type_spare_part_id')->unsigned()->foreing('type_spare_parts', 'id');
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
        Schema::drop('spare_parts');
    }
}
