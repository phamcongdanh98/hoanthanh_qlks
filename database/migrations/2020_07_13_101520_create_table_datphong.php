<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDatphong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datphong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('ngaynhanphong');
            $table->date('ngaytraphong');
            $table->integer('soluongphong');
            $table->integer('soluongkhach');
            $table->integer('check');
            $table->double('tonggia');
            $table->integer('thanhtoan');
            $table->unsignedBigInteger('idPhong');
            $table->foreign('idPhong')->references('id')->on('phong');
            $table->unsignedBigInteger('idKhachHang');
            $table->foreign('idKhachHang')->references('id')->on('khachhang');
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
        Schema::dropIfExists('datphong');
    }
}
