<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('danhmuc_id')->nullable();
            $table->string('tensanpham');
            $table->string('mota');
            $table->string('hinhanh');
            $table->float('giatien', 10, 2);
            $table->timestamps();
            $table->foreign('danhmuc_id')->references('id')->on('danhmuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
