<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JournalPost>
 */
class JournalPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Commands to seed the database:
        // php artisan migrate
        // php artisan tinker
        // \App\Models\JournalPost::factory()->times(15)->create();

        return [
            'title'     => $this->faker->sentence,
            'content'   => $this->faker->paragraph(15),
            'author_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
