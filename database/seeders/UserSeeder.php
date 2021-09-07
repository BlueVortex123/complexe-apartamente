<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
        ])->assignRole('admin');
        
        User::create([
            'name' => 'contabil',
            'email' => 'contabil@contabil.com',
            'password' => bcrypt('contabil'),
        ])->assignRole('contabil');
        
        User::create([
            'name' => 'agent',
            'email' => 'agent@agent.com',
            'password' => bcrypt('agent'),
        ])->assignRole('agent');
    }
}
