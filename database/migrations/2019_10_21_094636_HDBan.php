<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HDBan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HDBan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ma');
            $table->date('Ngay');
            $table->string('id_nhanvien');
            $table->integer('ThanhTien');
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
        Schema::dropIfExists('HDBan');
    }
}
