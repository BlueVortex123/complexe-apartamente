<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartament extends Model
{
    use HasFactory;
    protected $table = 'apartamente';

    protected $fillable =[
        'cladiri_id',
        'etaj',
        'numar',
        'suprafata',
        'numar_camere',
        'vedere'

    ];

    public function cladire()
    {
        return $this->belongsTo(Cladire::class,'cladiri_id');
    }

    public function proprietar()
    {
        return $this->belongsTo(Proprietar::class,'proprietari_id');
    }
}
