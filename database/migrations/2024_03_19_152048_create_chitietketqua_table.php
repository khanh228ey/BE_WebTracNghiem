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
        Schema::create('chitietketqua', function (Blueprint $table) {
            $table->id();
            $table->string('dap_an_chon');
            $table->unsignedBigInteger('ketqua_id');
            $table->unsignedBigInteger('cauhoi_id');
            $table->foreign('ketqua_id')->references('id')->on('ketqua')->onDelete('cascade');
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
        Schema::dropIfExists('chitietketqua');
    }
};
