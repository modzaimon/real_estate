<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('estate_id');
            $table->integer('seller_id');
            // $table->date('deposit_date');
            // $table->date('contact_date');
            // $table->integer('deposit');
            // $table->integer('contact_payment');
            // $table->integer('down_payment');
            // $table->integer('discount');
            $table->date('transfer_date')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
