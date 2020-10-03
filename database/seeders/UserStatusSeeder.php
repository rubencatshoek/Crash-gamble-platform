<?php

namespace Database\Seeders;

use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       UserStatus::create([
           'status_id' => 2,
           'user_id' => 6
      ]);
        UserStatus::create([
            'status_id' => 1,
            'user_id' => 6
        ]);
    }
}
