<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
        $title = fake()->words(random_int(3, 6), asText: true);

        return [
            'title' => str($title)->title()->toString(),
            'content' => implode(' ', fake()->words(random_int(10, 25))),
            'user_id' => fake()->boolean() ? User::factory() : null,
            'company_id' => fake()->boolean() ? Company::factory() : null,
        ];
    }


    public function userCreatedAndCompany(): static
    {
        return $this->state(fn() => [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
        ]);
    }
}
