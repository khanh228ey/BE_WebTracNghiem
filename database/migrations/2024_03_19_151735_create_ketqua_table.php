<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketqua', function (Blueprint $table) {
            $table->id();
            $table->integer('socaudung');
            $table->integer('sodiem');
            $table->dateTime('thoigianvaothi');
            $table->integer('thoigianlambai');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dethi_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dethi_id')->references('id')->on('dethi')->onDelete('cascade');
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
        Schema::dropIfExists('ketqua');
    }
};
