<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'surname' => 'User',
            'email' => 'admin@crud.com',
            'is_admin' => 1,
        ]);

        \App\Models\User::factory()
            ->count(30)
            ->create();

        $this->call(LanguageSeeder::class);
        $this->call(InterestSeeder::class);
    }
}
