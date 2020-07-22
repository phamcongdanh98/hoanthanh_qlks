<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnhphong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhphong', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('anh');
            $table->unsignedBigInteger('idPhong');
            $table->foreign('idPhong')->references('id')->on('phong');
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
        Schema::dropIfExists('anhphong');
    }
}
