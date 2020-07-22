<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tieude');
            $table->text('tenkhongdau');
            $table->text('tomtat');
            $table->text('noidung');
            $table->string('hinh');
            $table->integer('luotxem');
            $table->unsignedBigInteger('idLoaiBaiViet');
            $table->foreign('idLoaiBaiViet')->references('id')->on('loaibaiviet');
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
        Schema::dropIfExists('baiviet');
    }
}
