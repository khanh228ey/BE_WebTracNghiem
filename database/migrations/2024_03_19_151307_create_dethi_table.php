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
        Schema::create('dethi', function (Blueprint $table) {
            $table->id();
            $table->string('tendethi');
            $table->string('slug');
            $table->dateTime('thoigiantao');
            $table->integer('thoigianthi');
            $table->dateTime('thoigianbatdau');
            $table->dateTime('thoigiankethtuc');
            $table->integer('soluongcauhoi');
            $table->unsignedBigInteger('monhoc_id'); 
            $table->foreign('monhoc_id')->references('id')->on('monhoc')->onDelete('cascade');
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
        Schema::dropIfExists('dethi');
    }
};
