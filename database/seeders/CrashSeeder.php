<?php

namespace Database\Seeders;

use App\Models\Crash;
use Illuminate\Database\Seeder;

class CrashSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Crash::factory()->times(1500)->create();
    }
}
