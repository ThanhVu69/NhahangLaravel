<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CTHDban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CTHDBan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma');
            $table->integer('id_hoadonban');
            $table->integer('id_monan');
            $table->integer('SoLuong');
            $table->integer('TongTien');
            $table->string('DVTinh');
            $table->integer('Dongia');
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
        Schema::dropIfExists('CTHDban');
    }
}
