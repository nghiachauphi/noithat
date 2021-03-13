<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regis_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoidung_id')->nullable();
            $table->unsignedBigInteger('sanpham_id');
            $table->float('price', 20, 2)->nullable();
            $table->integer('soluong');
            $table->integer('status')->default(0)->comment('0=chưa duyệt; 1=duyệt; 2=hủy')->nullable();
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
        Schema::dropIfExists('regis_products');
    }
}
