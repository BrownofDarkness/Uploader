<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'departement',
        'commune',
        'arrondissement',
        'town',
        'longitude',
        'latitude',
        'description',
        'hauteur',
        'propriétaire',
        'adress',
        'delivrate_at',
        'expire_at',
        'file_name',
    ];

    protected $casts = [
        'delivrate_at' => 'datetime',
        'expire_at' => 'datetime',
    ];
}
