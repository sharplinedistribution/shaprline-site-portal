<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'token' => Str::random(20),
            'customer_id' => 1,
            'amount' => '2.3',
            'currency' => 'USD', // password
            'status' => "Approved",
            'first_4' => fake()->numberBetween(1000, 100000000),
            'last_6' => fake()->numberBetween(1000, 100000000),
            'fees' => '3.5',
            'object' => fake()->sentence(),
            'user_id' => 1,
            'package' =>  fake()->word(),
            'name' => fake()->name(),
            'email' => fake()->email(),
            'country' => fake()->country(),
            'state' => fake()->state(),
            'city' => fake()->city(),
            'zip' => fake()->postcode(),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'merchant_id' => Str::random(10),
        ];
    }
}
