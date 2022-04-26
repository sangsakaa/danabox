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
        Schema::create('setor', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_setor');
            $table->bigInteger('nasabah_id');
            $table->bigInteger('penyetor_id');
            $table->integer('setor_box')->nullable();
            $table->integer('setor_sp')->nullable();
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
        Schema::dropIfExists('setor');
    }
};