<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    use HasFactory;

    protected $table = 'complexe';

    protected $fillable = [
        'nume',
        'adresa'
    ];

    public function cladiri()
    {
        return $this->hasMany(Cladire::class);
    }
}
