<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    protected $fillable = [
        'status', 'id_debitur', 'pinjaman', 'tanggalpinjam', 'approved',
    ];
}
