<?php

namespace Database\Seeders;

use Faker\Generator;
use Illuminate\Container\Container;

use DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('journal_posts')->insert([
                'title' => $this->faker->sentence,
                'content' => $this->faker->paragraph(15),
                'author_id' => $this->faker->numberBetween(1, 10),
            ]);
        }
    }
}