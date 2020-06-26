<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->integer('contact_no')->comment('เลขที่สัญญา');
            $table->date('create_date')->comment('วันเริ่มทำสัญญา');
            $table->date('end_date')->comment('วันที่สิ้นสุดสัญญา');
            $table->double('price',22,2)->comment('ราคาห้อง');
            $table->double('earnest',22,2)->comment('ค่ามัดจำ');
            $table->integer('status')->comment('สถานะสัญญา 1 รออนุมัติ , 2 อนุมัติ');
            $table->date('confirm_at')->comment('วันที่ทำสัญญา');
            $table->date('cancel_at')->comment('วันที่ยกเลิกสัญญา');
            $table->bigInteger('room_id')->unsigned()->comment('ไอดีห้อง');
            $table->bigInteger('type_id')->unsigned()->comment('ประเภทสัญญา 1 = เช่า , 2 = ขาย');
            $table->bigInteger('customer_id')->unsigned()->comment('รหัสลูกค้า');
            $table->bigInteger('user_id')->unsigned()->comment('รหัสพนักงาน');
            $table->bigInteger('building_id')->unsigned()->comment('รหัสตึก');
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
        Schema::dropIfExists('contacts');
    }
}
