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
        Bet::create(['user_id' => 1, 'crash_id' => '1', 'amount_bet' => 100.000, 'user_crashed_at' => 2]);
    }
}
