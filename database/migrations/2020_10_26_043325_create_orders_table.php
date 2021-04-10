<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nguoidung_id');
            $table->float('tongtien',20,2);
            $table->string('hovaten');
            $table->string('diachi');
            $table->string('email');
            $table->string('dienthoai');
            $table->string('ghichu')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
