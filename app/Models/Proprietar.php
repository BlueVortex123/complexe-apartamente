<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proprietar extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'proprietari';

    protected $fillable =[
        'nume',
        'CNP',
        'adresa',
        'telefon',
        'email'
    ];

    public function apartamente()
    {
        return $this->hasMany(Apartament::class,'proprietari_id');
    }
}
