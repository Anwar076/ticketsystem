<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return User::all()->random()->id;
            },
            'event_id' => function () {
                return Event::all()->random()->id;
            },
            'scanned' => $this->faker->boolean,
            // Voeg hier andere velden toe die nodig zijn voor een reservering...

        ];

    }
}
