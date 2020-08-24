<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayah_kabupaten', function (Blueprint $table) {
            $table->string('id',4);            
            $table->string('provinsi_id',2);            
            $table->string('nama',50);
            
            $table->primary('id'); 
            $table->index('provinsi_id'); 
            
            $table->foreign('provinsi_id')
                ->references('id')
                ->on('wilayah_provinsi')
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
        Schema::dropIfExists('wilayah_kabupaten');
    }
}
