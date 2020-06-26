<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
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
            $table->foreign('juristic_id')->references('id')->on('juristics')->onDelete('cascade');
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
    }
}
