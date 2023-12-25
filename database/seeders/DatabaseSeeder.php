<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public $data = [
        [
            'name' => 'Ayam Geprek',
            'type' => 'Makanan',
            'stock' => 12,
            'prize' => 10000
        ],
        [
            'name' => 'Mie Ayam',
            'type' => 'Makanan',
            'stock' => 4,
            'prize' => 12000
        ],
        [
            'name' => 'Mie Goreng',
            'type' => 'Makanan',
            'stock' => 7,
            'prize' => 12000
        ],
        [
            'name' => 'Nasi Goreng',
            'type' => 'Makanan',
            'stock' => 3,
            'prize' => 11000
        ],
        [
            'name' => 'Gorengan',
            'type' => 'Dessert',
            'stock' => 20,
            'prize' => 1000
        ],
        [
            'name' => 'Cheese Cake',
            'type' => 'Dessert',
            'stock' => 9,
            'prize' => 15000
        ],
        [
            'name' => 'Kue Bolu',
            'type' => 'Dessert',
            'stock' => 14,
            'prize' => 2000
        ],
        [
            'name' => 'Es Teh Manis',
            'type' => 'Minuman',
            'stock' => 23,
            'prize' => 5000
        ],
        [
            'name' => 'Es Jeruk',
            'type' => 'Minuman',
            'stock' => 17,
            'prize' => 6000
        ],
        [
            'name' => 'Es Milo',
            'type' => 'Minuman',
            'stock' => 11,
            'prize' => 5000
        ],
    ];
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'example',
        //     'email' => 'example@example.com',
        //     'password' => Hash::make('example123'),
        // ]);

        foreach ($this -> data as $item) {
            \App\Models\Food::factory()->create($item);
        }

    }
}
