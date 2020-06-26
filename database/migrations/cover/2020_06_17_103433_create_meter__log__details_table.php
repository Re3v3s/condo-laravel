<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterLogDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter__log__details', function (Blueprint $table) {
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

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meter__log__details');
    }
}
