<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double('total_price',22,2)->comment('จำนวนเงินรวม');
            $table->date('order_date')->comment('วันที่ออกบิล');
            $table->integer('status')->comment('สถานะ 0 คือยังไม่ชำระ , 1 คือชำระแล้ว');
            $table->date('payment_at')->comment('วันที่ชำระ');
            $table->string('month')->comment('เดือน');
            $table->integer('year')->comment('ปี');
            $table->string('description')->comment('หมายเหตุ');
            $table->bigInteger('room_id')->unsigned()->comment('รหัสห้อง');
            $table->bigInteger('customer_id')->unsigned()->comment('รหัสลูกค้า');
            $table->bigInteger('juristic_id')->unsigned()->comment('รหัสนิติบุคคล');
            $table->bigInteger('user_id')->unsigned()->comment('รหัสพนักงาน');
            $table->bigInteger('meter_log_id')->unsigned()->comment('รหัสมิเตอร์น้ำ');
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
        Schema::dropIfExists('orders');
    }
}
