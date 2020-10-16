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
        SquadMember::create(['squad_id' => 1, 'user_id' => 53, 'role_id' => 1]);
    }
}
