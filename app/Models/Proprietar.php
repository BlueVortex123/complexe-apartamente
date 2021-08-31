<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proprietar extends Model
{
    use HasFactory;
    protected $table = 'proprietari';

    protected $fillable =[
        'nume',
        'CNP',
        'adresa',
        'telefon',
        'email'
    ];

    public function apartament()
    {
        return $this->hasOne(Apartament::class);
    }
}
