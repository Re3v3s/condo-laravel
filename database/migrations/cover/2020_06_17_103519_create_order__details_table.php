<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__details', function (Blueprint $table) {
            $table->id();
            $table->double('amout',22,0)->comment('จำนวน');
            $table->double('price',22,2)->comment('จำนวนเงิน');
            $table->double('total',22,2)->comment('รวมเป็นเงิน');
            $table->bigInteger('service_id')->unsigned()->comment('รหัสค่าบริการ');
            $table->bigInteger('order_id')->unsigned()->comment('รหัสบิล');
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
        Schema::dropIfExists('order__details');
    }
}
