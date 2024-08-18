<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name'=>'',
            'username' => 'super-admin',
            'email' => 'superadmin@yahoo.com',
            'password' => '$2y$12$3PFNV43.lUmAtqTUCbDWyex0iGzpexce0eO0ktpln5FZveB1QAeCK',
            'role_id' => 1,

        ]);
    }
}
