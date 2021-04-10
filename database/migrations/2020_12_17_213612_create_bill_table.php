<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoidung_id')->nullable();
            $table->unsignedBigInteger('sanpham_id');
            $table->float('price', 20, 2);
            $table->integer('soluong')->nullable();
            $table->integer('status')->default(0)->comment('0=đang giao; 1=đã giao;')->nullable();
            $table->integer('order_id')->nullable();
            $table->float('discount', 10, 2)->nullable();
            $table->string('trongluong')->nullable();
            $table->string('chatlieu')->nullable();
            $table->string('kichthuoc')->nullable();
            $table->foreign('nguoidung_id')->references('id')->on('nguoidung');
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
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
        Schema::dropIfExists('bill');
    }
}
