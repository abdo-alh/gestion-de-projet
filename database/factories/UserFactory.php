<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'matriculation' => 'm2',
            'nom' => 'amine',
            'prenom' => 'amine',
            'poste' => 'modir',
            'role' => 1,
            'cin' => 'EE888888',
            'telephone' => '0677777777',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user1234'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
