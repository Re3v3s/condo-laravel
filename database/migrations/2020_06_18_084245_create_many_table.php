<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ชื่อ');
            $table->string('detail')->comment('รายละเอียด');
            $table->string('address')->comment('ที่อยู่');
            $table->string('amphur')->comment('อำเภอ');
            $table->string('district')->comment('ตำบล');
            $table->string('province')->comment('จังหวัด');
            $table->integer('postcode')->comment('รหัสไปรษณีย์');
            $table->string('phone')->comment('เบอร์โทรศัพท์');
            $table->bigInteger('juristic_id')->unsigned();
            $table->timestamps();
        });

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

        Schema::create('contact_types', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('อักษรนำหน้าเลขสัญญา');
            $table->string('description')->comment('รายละเอียด');
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->comment('ชื่อ');
            $table->string('lastname')->comment('นามสกุล');
            $table->string('address')->comment('ที่อยู่');
            $table->string('aumphur')->comment('อำเภอ');
            $table->string('district')->comment('ตำบล');
            $table->string('province')->comment('จังหวัด');
            $table->integer('postcode')->comment('รหัสไปรณีย์');
            $table->string('phone')->comment('เบอร์โทรศัพท์');
            $table->date('birthdate')->comment('วันเกิด');
            $table->integer('idcard')->comment('รหัสบัตรประชาชน');
            $table->timestamps();
        });

        Schema::create('juristics', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ชื่อ');
            $table->string('lastname')->comment('นามสกุล');
            $table->string('address')->comment('ที่อยู่');
            $table->string('aumphur')->comment('อำเภอ');
            $table->string('district')->comment('ตำบล');
            $table->string('province')->comment('จังหวัด');
            $table->string('postcode')->comment('รหัสไปรณีย์');
            $table->string('phone')->comment('เบอร์โทรศัพท์');
            $table->date('birthdate')->comment('วันเกิด');
            $table->integer('idcard')->comment('รหัสบัตรประชาชน');
            $table->timestamps();
        });

        Schema::create('meter_logs', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('หมายเหตุ');
            $table->integer('meter_current')->comment('เลขมิเตอร์ปัจจุบัน');
            $table->timestamps();
        });

        Schema::create('meter_log_details', function (Blueprint $table) {
            $table->id();
            $table->integer('old_number')->comment('เลขน้ำครั้งเก่า');
            $table->integer('new_number')->comment('เลขน้ำครั้งใหม่');
            $table->date('date_check')->comment('วันที่ทำการเช็ค');
            $table->double('price_water',8,2)->comment('ค่าน้ำ');
            $table->string('month')->comment('เดือน');
            $table->integer('year')->comment('ปี');
            $table->bigInteger('meter_log_id')->unsigned()->comment('รหัสมิเตอร์น้ำ');
            $table->timestamps();
        });

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

        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->double('amout',22,0)->comment('จำนวน');
            $table->double('price',22,2)->comment('จำนวนเงิน');
            $table->double('total',22,2)->comment('รวมเป็นเงิน');
            $table->bigInteger('service_id')->unsigned()->comment('รหัสค่าบริการ');
            $table->bigInteger('order_id')->unsigned()->comment('รหัสบิล');
            $table->timestamps();
        });

        Schema::create('repairs', function (Blueprint $table) {
            $table->id();
            $table->string('detail')->comment('รายละเอียด');
            $table->double('price',22,2)->comment('ราคา');
            $table->date('date_call')->comment('วันที่แจ้ง');
            $table->date('date_do')->comment('วันที่ทำการซ่อม');
            $table->string('month')->comment('เดือน');
            $table->integer('year')->comment('ปี');
            $table->bigInteger('service_id')->unsigned()->comment('รหัสบริการ');
            $table->bigInteger('room_id')->unsigned()->comment('รหัสห้อง');
            $table->timestamps();
        });

        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('name')->comment('เลขห้อง');
            $table->integer('floor')->comment('ชั้น');
            $table->integer('water_price')->comment('ราคาค่าน้ำ');
            $table->bigInteger('building_id')->unsigned()->comment('รหัสตึก');
            $table->bigInteger('customer_id')->unsigned()->comment('รหัสลูกค้า');
            $table->bigInteger('meter_log_id')->unsigned()->comment('รหัสมิเตอร์น้ำ');
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ชื่อบริการ');
            $table->string('unit')->comment('หน่วยนับ');
            $table->double('price',8,2)->comment('ราคา');
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
        Schema::dropIfExists('buildings');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('contact_types');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('juristics');
        Schema::dropIfExists('meter_logs');
        Schema::dropIfExists('meter_log_details');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('repairs');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('services');
    }
}
