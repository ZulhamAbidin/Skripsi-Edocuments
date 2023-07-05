<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengesahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengesahan', function (Blueprint $table) {
            $table->id();
            $table->string('NamaLengkap');
            $table->string('AlamatDomisili');
            $table->string('JenisKelamin');
            $table->string('NoTelfon');
            $table->string('Agama');
            $table->string('PendidikanTerakhir');
            $table->string('Jurusan')->nullable();
            $table->date('TanggalPengesahan');
            $table->date('TanggalPengambilan')->nullable();
            $table->time('WaktuPengambilan')->nullable();
            $table->string('Total');
            $table->string('Status')->default('BelumTerverifikasi');
            $table->integer('User_id');
            $table->text('AlasanPenolakan')->nullable();
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
        Schema::dropIfExists('pengesahan');
    }
}
