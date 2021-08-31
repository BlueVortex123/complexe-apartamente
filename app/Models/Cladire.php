<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cladire extends Model
{
    use HasFactory;
    protected $table = 'cladiri';

    protected $fillable =[
        'complex_id',
        'nume',
        'numar_etaje'
    ];

    public function complex()
    {
        return $this->belongsTo(Provider::class, 'complex_id');
    }

    public function apartamente()
    {
        return $this->hasMany(Apartament::class);
    }
}
