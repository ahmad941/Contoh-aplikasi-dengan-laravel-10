<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan')->insert([
            'tanggal' => '2024-06-22',
            'des' => 'Acara Hari raya idul adha 1445 H',
        ]);
        //  DB::table('kas_masjid')->insert([
        // 'type' =>'kas masuk',
        //  'nominal'=>'700000', 
        //  'des' =>'infaq jumat',
        //  'image'=>'default.jpg',

    }
}
