<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietsp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sanpham_id')->nullable();
            $table->string('manhinh')->nullable();
            $table->string('os')->nullable();
            $table->string('camera_sau')->nullable();
            $table->string('camera_truoc')->nullable();
            $table->string('cpu')->nullable();
            $table->string('ram')->nullable();
            $table->string('bonhotrong')->nullable();
            $table->string('thenho')->nullable();
            $table->string('sim')->nullable();
            $table->string('pin')->nullable();
            $table->string('pk_sac')->nullable();
            $table->string('pk_tainghe')->nullable();
            $table->timestamps();
            $table->foreign('sanpham_id')->references('id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitietsp');
    }
}
