<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah_kecamatan', function (Blueprint $table) {
            $table->string('id',7);            
            $table->string('kabupaten_id',4);            
            $table->string('nama',50);
            
            $table->primary('id');    
            $table->index('kabupaten_id'); 
            
            $table->foreign('kabupaten_id')
                ->references('id')
                ->on('wilayah_kabupaten')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wilayah_kecamatan');
    }
}
