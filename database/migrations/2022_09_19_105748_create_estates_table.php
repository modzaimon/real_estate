<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->text('number');
            $table->text('deed_no')->nullable();
            $table->integer('price');
            $table->integer('type_id');
            $table->integer('size')->nullable();
            $table->integer('unit_id')->nullable();
            $table->year('build_year');
            $table->text('des')->nullable();

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
        Schema::dropIfExists('estates');
    }
}
