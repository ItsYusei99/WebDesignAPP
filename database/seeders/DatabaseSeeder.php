<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Order::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $nombres = ['Admin', 'Ventas', 'Almacén', 'Ruta', 'Compras'];

    foreach ($nombres as $nombre) {
        \App\Models\Department::create(['name' => $nombre]);
    }

    \App\Models\Order::factory(10)->create();
    }
}
