<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhoi', function (Blueprint $table) {
            $table->id();
            $table->string('noidung');
            $table->string('dap_an_a');
            $table->string('dap_an_b');
            $table->string('dap_an_c');
            $table->string('dap_an_d');
            $table->string('dap_an_dung');
            $table->unsignedBigInteger('dethi_id');
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
        Schema::dropIfExists('cauhoi');
    }
};
