<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasiSantriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasi_santri', function (Blueprint $table) {
            $table->foreignId('relasi_id');
            $table->foreignId('santri_id');
            $table->primary(['relasi_id', 'santri_id']);

            $table->foreign('relasi_id')->references('id')->on('relasis')->onDelete('cascade');
            $table->foreign('santri_id')->references('id')->on('santris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relasi_santri');
    }
}
