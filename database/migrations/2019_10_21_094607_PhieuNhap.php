<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhieuNhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhieuNhap', function (Blueprint $table) {
            $table->increments('id');
            $table->date('Ngay');
            $table->string('id_nhanvien');
            $table->string('id_cuahang');
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
        Schema::dropIfExists('PhieuNhap');
    }
}
