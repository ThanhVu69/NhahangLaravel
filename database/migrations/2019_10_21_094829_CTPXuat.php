<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTPXuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTPXuat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_phieuxuat');
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
        Schema::dropIfExists('CTPXuat');
    }
}
