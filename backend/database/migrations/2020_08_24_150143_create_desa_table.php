<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah_desa', function (Blueprint $table) {
            $table->string('id',10);            
            $table->string('kecamatan_id',7);            
            $table->string('nama',50);
            
            $table->primary('id');  
            $table->index('kecamatan_id'); 
            
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('wilayah_kecamatan')
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
        Schema::dropIfExists('wilayah_desa');
    }
}
