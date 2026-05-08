<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $nombres = [
            'Administration', 
            'Sales',       
            'Purchasing',    
            'Warehouse',      
            'Route'          
        ];

        foreach ($nombres as $nombre) {
            Department::create(['name' => $nombre]);
        }

        User::create([
            'name' => 'Administrador Halcon',
            'email' => 'admin@halcon.com',
            'password' => Hash::make('password'), 
            'department_id' => 1, 
        ]);

        Order::factory(10)->create();
    }
}