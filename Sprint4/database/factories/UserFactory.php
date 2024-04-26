<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $defaultPassword = $this->faker->password;

        return [
            'fname' => $this->faker->firstName,
            'lname' => $this->faker->lastName,
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'ptype' => $this->faker->randomElement(['Customer', 'Consultant']),
            'pass' => Hash::make($defaultPassword),
        ];
    }
}
