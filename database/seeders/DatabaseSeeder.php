<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleAndPermissionSeed::class
        ]);
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Rizki',
            'email' => 'admin@gmail.com',
            'password' => '123'
        ]);

        $user2 = User::factory()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => '123'
        ]);
        
        $user2->assignRole('user'); 
        
        $user->assignRole('admin'); 
        
    }
}
