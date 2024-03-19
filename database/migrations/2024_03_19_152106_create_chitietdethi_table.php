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
        Schema::create('chitietdethi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dethi_id');
            $table->unsignedBigInteger('cauhoi_id');
            $table->foreign('dethi_id')->references('id')->on('dethi')->onDelete('cascade');
            $table->foreign('cauhoi_id')->references('id')->on('cauhoi')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdethi');
    }
};
