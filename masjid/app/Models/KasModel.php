<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasModel extends Model
{
   protected $table = 'kas_masjid'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'type', 'nominal', 'des', 'image'
    ];
}
