<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tenphong');
            $table->string('anhdaidien');
            $table->text('thongtin');
            $table->integer('soluong');
            $table->string('dientich');
            $table->string('giaphong');
            $table->unsignedBigInteger('idLoaiPhong');
            $table->foreign('idLoaiPhong')->references('id')->on('loaiphong');
            $table->unsignedBigInteger('idTang');
            $table->foreign('idTang')->references('id')->on('tang');
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
        Schema::dropIfExists('phong');
    }
}
