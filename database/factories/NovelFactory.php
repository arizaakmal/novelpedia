<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Novel>
 */
class NovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rating = number_format(mt_rand(0, 100) / 10, 1);

        if ($rating == 10) {
            $rating = number_format($rating, 0); // If rating is 10, set decimal value to 0 digits
        }

        return [
            'title' => $this->faker->sentence(mt_rand(3, 10)),
            'slug' => $this->faker->slug(),
            'views' => mt_rand(0, 100000),
            'pages' => mt_rand(5, 500),
            'rating' => $rating,
            'description' => $this->faker->paragraphs(mt_rand(1, 3), true),
            'author_id' => mt_rand(1, 5),
        ];
    }
}
