<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory(10)->create();
        \App\Models\Event::factory(100)->create();
        $reservations = Reservation::factory(10)->create();
        foreach ($reservations as $reservation) {
            // Maak 1 tot 10 tickets voor elke reservering
            Ticket::factory(rand(1, 10))->state(['reservation_id' => $reservation->id])->create();
        }

        \App\Models\Role::create(['name' => 'admin']);
        \App\Models\Role::create(['name' => 'customer']);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

