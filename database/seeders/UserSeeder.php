<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->create([
                'role' => 'admin',
            ]);

        User::factory()
            ->count(2)
            ->create([
                'role' => 'author',
            ]);

        User::factory()
            ->count(2)
            ->create();
    }
}
