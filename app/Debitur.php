<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debitur extends Model
{
    protected $fillable = [
        'nama', 'no_ktp', 'ttl', 'gaji', 'tanggungan', 'kebutuhan', 'gender', 'occupation',
    ];
}
