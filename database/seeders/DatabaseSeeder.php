<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(SquadSeeder::class);
        $this->call(SquadRoleSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(SquadMemberSeeder::class);
        $this->call(CrashSeeder::class);
        $this->call(BetSeeder::class);
        $this->call(AchievementSeeder::class);
    }
}
