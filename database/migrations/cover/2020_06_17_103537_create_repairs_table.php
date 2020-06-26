<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repairs');
    }
}
