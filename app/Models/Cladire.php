<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cladire extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'cladiri';

    protected $fillable =[
        'complex_id',
        'nume',
        'numar_etaje'
    ];

    public function complex()
    {
        return $this->belongsTo(Complex::class, 'complex_id');
    }

    public function apartamente()
    {
        return $this->hasMany(Apartament::class,'cladiri_id');
    }
}
