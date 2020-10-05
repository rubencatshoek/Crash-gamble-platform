<?php

namespace Database\Seeders;

use App\Models\Squad;
use Illuminate\Database\Seeder;

class SquadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Squad::factory()->times(10)->create();
    }
}
