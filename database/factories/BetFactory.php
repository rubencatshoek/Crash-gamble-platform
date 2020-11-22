<?php

namespace Database\Factories;

use App\Models\Bet;
use Illuminate\Database\Eloquent\Factories\Factory;

class BetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 150),
            'crash_id' => $this->faker->numberBetween(1, 150),
            'amount_bet' => $this->faker->randomFloat(10, 0, '10'),
            'user_crashed_at' => $this->faker->numberBetween(10, 50),
        ];
    }
}
