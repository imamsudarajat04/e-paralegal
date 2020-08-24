<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid('kegiatan_id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->dateTime('tanggal');
            $table->string('tempat');
            $table->tinyInteger('id_jenis_kegiatan');
            $table->string('nama_jenis');
            $table->string('nama_kegiatan');
            $table->string('pemohon');
            $table->string('daftar_hadir');
            $table->string('fotocopy_ktp');
            $table->text('uraian_kegiatan');
            $table->text('rekomendasi_kegiatan');
            $table->string('dokumentasi_kegiatan');
            $table->tinyInteger('id_status');
            $table->timestamps();

            $table->index('id_jenis_kegiatan');
            $table->index('user_id');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('id_jenis_kegiatan')
                ->references('id_jenis')
                ->on('jenis_kegiatan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
