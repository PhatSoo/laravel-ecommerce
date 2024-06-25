<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->createMany([
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => null,
                'status' => false,
                'password' => 'asdasd',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'isAdmin' => true,
                'password' => 'asdasd',
            ]
        ]);

        Category::create([
            'name' => 'Food',
        ]);

        Product::create([
            'name' => 'Grapes',
            'stock' => 12,
            'category_id' => 1
        ]);
    }
}