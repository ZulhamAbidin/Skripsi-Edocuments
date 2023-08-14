<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            // $table->string('NIK')->nullable();
            // $table->string('NIK')->unique();
            $table->string('NamaLengkap');
            $table->string('AlamatDomisili');
            $table->string('JenisKelamin');
            $table->string('PendidikanTerakhir');
            $table->string('Jurusan');
            $table->date('TanggalPengesahan');
            $table->date('TanggalPengambilan')->nullable();
            $table->time('WaktuPengambilan')->nullable();
            $table->string('Total');
            $table->string('Status')->default('BelumTerverifikasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data');
    }
};
