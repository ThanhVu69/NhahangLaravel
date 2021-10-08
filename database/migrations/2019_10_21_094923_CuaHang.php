<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuaHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CuaHang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('MaCH');
            $table->string('TenCH');
            $table->string('DiaChi');
            $table->string('TenQL');
            $table->string('SDT');
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
        Schema::dropIfExists('CuaHang');
    }
}
