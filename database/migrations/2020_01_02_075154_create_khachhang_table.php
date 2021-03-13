<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoidung_id');
            $table->string('product');
            $table->integer('soluong');
            $table->float('price', 20, 2)->comment('gia');
            $table->foreign('nguoidung_id')->references('id')->on('nguoidung');
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
		Schema::dropIfExists('carts');
	}
}