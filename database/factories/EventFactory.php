<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EventFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = app(\Faker\Generator::class);
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $today = Carbon::now(); // Huidige datum en tijd
        $sevenDaysAgo = $today->copy()->subDays(7);
        $date = fake()->dateTimeBetween('-10 days', '+30 days', null);
        $hour = fake()->randomElement([14, 15, 16]); // Kies een willekeurig uur
        $minutes = fake()->numberBetween(0, 59); // Genereer willekeurige minuten

        $time = sprintf('%02d:%02d', $hour, $minutes); // Formatteer de tijd als HH:MM

        return [
            'imageurl' =>$faker->imageUrl(),
            'title' => fake()->sentence(),
            'date' => $date,
            'time' => $time,
            'location' => fake()->address(),
            'created_at' => now(),
            'updated_at' => now(),
            'description' =>fake()->text(),
            'price' => $faker->randomFloat(2, 0, 1000), // Genereert een willekeurige prijs tussen 0 en 1000 met 2 decimalen

        ];
    }




    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
