<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'slug'=>$this->faker->slug,
            'title'=>$this->faker->sentence,
            'excerpt'=>$this->faker->paragraphs(2,true),
            'body'=>$this->faker->paragraphs(2,true),

        ];
    }
}
