<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
