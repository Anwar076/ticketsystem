<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::all()->each(function ($user) {
            Event::factory()->count(10)->create(['user_id' => $user->id]);
        });
        \App\Models\User::factory(10)->create();
        \App\Models\Event::factory(100)->create();

        \App\Models\Role::create(['name' => 'admin']);
        \App\Models\Role::create(['name' => 'customer']);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
