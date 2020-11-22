<?php

namespace Database\Seeders;

use App\Models\Bet;
use Illuminate\Database\Seeder;

class BetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bet::factory()->times(1500)->create();
    }
}
