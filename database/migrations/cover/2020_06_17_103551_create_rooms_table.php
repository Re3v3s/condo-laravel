<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
