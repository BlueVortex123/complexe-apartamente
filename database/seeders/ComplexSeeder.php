<?php

namespace Database\Seeders;

use App\Models\Complex;
use Illuminate\Database\Seeder;

class ComplexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Complex::create([
            'nume' => 'Complex A',
            'address' => 'Adresa 1 compelex a'
        ]);
        
        Complex::create([
            'nume' => 'Complex B',
            'address' => 'Adresa 2 complex b'
            ]);
       
        Complex::create([
            'nume' => 'Complex C',
            'address' => 'Adresa 3 complex c'
            ]);
    }
}
