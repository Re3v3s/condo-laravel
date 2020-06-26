<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter__logs', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('หมายเหตุ');
            $table->integer('meter_current')->comment('เลขมิเตอร์ปัจจุบัน');
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
        Schema::dropIfExists('meter__logs');
    }
}
