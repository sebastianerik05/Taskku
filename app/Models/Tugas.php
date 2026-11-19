<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'mata_kuliah',
        'deskripsi',
        'tenggat',
        'status',
    ];
}
