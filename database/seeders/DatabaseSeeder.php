<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            JokeSeeder::class,
//            RolesPermissionsSeeder::class,
//            CategorySeeder::class,
//            PostSeeder::class,
        ]);

//        $user = User::factory()->create([
//            'name' => 'Claude',
//            'email' => 'claude@blogchain.news',
//            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
//        ]);
//
//        $user->assignRole('super-admin');
//
//        $user = User::factory()->create([
//            'name' => 'Renier',
//            'email' => 'renier@blogchain.news',
//            'password' => bcrypt(env('ADMIN_PASSWORD', 'password')),
//        ]);
//
//        $user->assignRole('super-admin');

    }
}
