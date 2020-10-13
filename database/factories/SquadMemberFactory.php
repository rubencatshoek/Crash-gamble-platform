<?php

namespace Database\Factories;

use App\Models\SquadMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class SquadMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SquadMember::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'squad_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 10),
            'role_id' => $this->faker->numberBetween(1, 3)
        ];
    }
}
