<?php

namespace Database\Seeders;

use App\Models\KasModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('kas_masjid')->insert([
        'type' =>'kas masuk',
         'nominal'=>'700000', 
         'des' =>'infaq jumat',
         'image'=>'default.jpg',
      ]);
    }
}
