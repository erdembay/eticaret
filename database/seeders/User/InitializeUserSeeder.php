<?php

namespace Database\Seeders\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class InitializeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678E.'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole('super-admin');
        $categoryManager = User::create([
            'name' => 'Category Manager',
            'email' => 'categorymanager@gmail.com',
            'password' => bcrypt('12345678E.'),
            'email_verified_at' => now(),
        ]);
        $categoryManager->assignRole('category-manager');
        $productManager = User::create([
            'name' => 'Product Manager',
            'email' => 'productmanager@gmail.com',
            'password' => bcrypt('12345678E.'),
            'email_verified_at' => now(),
        ]);
        $productManager->assignRole('product-manager');
        $userManager = User::create([
            'name' => 'User Manager',
            'email' => 'usermanager@gmail.com',
            'password' => bcrypt('12345678E.'),
            'email_verified_at' => now(),
        ]);
        $userManager->assignRole('user-manager');
        $orderManager = User::create([
            'name' => 'Order Manager',
            'email' => 'ordermanager@gmail.com',
            'password' => bcrypt('12345678E.'),
            'email_verified_at' => now(),
        ]);
        $orderManager->assignRole('order-manager');
    }
}
