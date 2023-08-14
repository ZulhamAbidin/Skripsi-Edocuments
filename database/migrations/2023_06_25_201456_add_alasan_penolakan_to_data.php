<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlasanPenolakanToData extends Migration
{
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->text('alasan_penolakan')->nullable();
        });
    }

    public function down()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->dropColumn('alasan_penolakan');
        });
    }
}
