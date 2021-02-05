<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag' => $this->faker->word,
            // 'product_name' => $this->faker->word,
            // 'price' => $this->faker->numberBetween($min = 500000, $max = 1500000),
            // 'image' => $this->faker->word,
            // 'number' => $this->faker->word,
        ];
    }
}
