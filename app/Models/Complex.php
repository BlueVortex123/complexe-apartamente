<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complex extends Model
{
    use SoftDeletes, HasFactory;

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
