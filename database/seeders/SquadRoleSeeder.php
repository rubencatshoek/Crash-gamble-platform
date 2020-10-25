<?php

namespace Database\Seeders;

use App\Models\SquadRole;
use Illuminate\Database\Seeder;

class SquadRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SquadRole::create(['name' => "Leader"]);
        SquadRole::create(['name' => "Co Leader"]);
        SquadRole::create(['name' => "Elder"]);
        SquadRole::create(['name' => "User"]);
    }
}
