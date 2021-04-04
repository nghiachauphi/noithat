<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaleNumberColumnInSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham', function (Blueprint $table) {
            $table->integer('soluong')->nullable()->after('giatien');
            $table->string('chatlieu')->nullable()->after('giatien');
            $table->string('kichthuoc')->nullable()->after('giatien');
            $table->string('trongluong')->nullable()->after('giatien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanpham', function (Blueprint $table) {
          //
        });
    }
}
