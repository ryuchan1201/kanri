<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'user_id' => $this->faker->numberBetween(1, 2),
            'title' => $this->faker->word,
            'author' => $this->faker->name,
            'price' => $this->faker->numberBetween(500, 2000),
            'memo' => $this->faker->realText(40),
            'purchased_date' => $this->faker->dateTimeThisMonth,
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
