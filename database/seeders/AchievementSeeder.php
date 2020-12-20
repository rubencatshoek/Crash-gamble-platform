<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements')->insert([
            'name' => 'Betting started',
            'description' => 'Bet atleast 10 times in the casino',
            'logic_added' => true,
        ]);

        DB::table('achievements')->insert([
            'name' => 'Bet 500',
            'description' => 'Bet atleast 500 currency in the casino',
        ]);
    }
}
