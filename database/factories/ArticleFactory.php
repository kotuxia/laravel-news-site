<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $previews = ['preview.jpg', 'preview_2.jpg'];
        $fulls = ['full.jpeg', 'full_2.jpeg'];

        return [
            'name'              => $this->faker->sentence(4),
            'short_description' => $this->faker->sentence(10),
            'content'           => $this->faker->paragraphs(3, true),
            'date'              => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'preview_image'     => $this->faker->randomElement($previews),
            'full_image'        => $this->faker->randomElement($fulls),
        ];
    }
}