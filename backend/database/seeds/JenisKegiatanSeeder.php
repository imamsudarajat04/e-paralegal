<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JenisKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('DELETE FROM jenis_kegiatan'); 
        
        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"1",
            'nama_jenis'=>'Penyuluhan Hukum',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);               

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"2",
            'nama_jenis'=>'Pemberdayaan Masyarakat',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);               

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"3",
            'nama_jenis'=>'Advokasi Kebijakan',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]); 

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"4",
            'nama_jenis'=>'Konsultasi Hukum',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"5",
            'nama_jenis'=>'Negosiasi',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"6",
            'nama_jenis'=>'Mediasi',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"7",
            'nama_jenis'=>'Pendampingan diluar pengadilan',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"8",
            'nama_jenis'=>'Drafting dokumen hukum',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        \DB::table('jenis_kegiatan')->insert([
            'id_jenis'=>"9",
            'nama_jenis'=>'Investigasi Perkara',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
    }
}
