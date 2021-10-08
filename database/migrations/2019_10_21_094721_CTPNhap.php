<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTPNhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTPNhap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_phieunhap');
            $table->integer('id_monan');
            $table->integer('id_hanghoa');
            $table->integer('SoLuong');
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
        Schema::dropIfExists('CTPNhap');
    }
}
