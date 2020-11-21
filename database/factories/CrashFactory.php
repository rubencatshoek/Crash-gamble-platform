<?php

namespace Database\Factories;

use App\Models\Crash;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrashFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crash::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'crashed_at' => $this->faker->numberBetween(1, 12),
        ];
    }
}
