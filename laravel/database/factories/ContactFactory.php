<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::first()->id,
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'email' => $this->faker->safeEmail(), 
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'building' => $this->faker->secondaryAddress(),
            'subject' => $this->faker->sentence(),
            'message' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}

