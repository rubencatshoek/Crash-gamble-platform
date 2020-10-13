<?php

namespace Database\Seeders;

use App\Models\SquadMember;
use Illuminate\Database\Seeder;

class SquadMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SquadMember::factory()->times(10)->create();
    }
}
