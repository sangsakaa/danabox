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
        Schema::create('instansi', function (Blueprint $table) {
            $table->id();
            $table->string('nip_kepala_instansi')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('nama_kepala_instansi')->nullable();
            $table->string('status_kepala_instansi')->nullable();
            $table->string('file')->nullable();
            $table->string('alamat_instansi')->nullable();
            $table->string('email_instansi')->nullable();
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
        Schema::dropIfExists('instansi');
    }
};
