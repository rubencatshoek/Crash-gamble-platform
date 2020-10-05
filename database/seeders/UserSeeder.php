<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->times(50)->create();
        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'paid_balance' => 500,
            'free_balance' => 100,
        ]);
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'user',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'paid_balance' => 500,
            'free_balance' => 100,
        ]);
        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'mod',
            'email' => 'mod@mod.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mod'),
        ]);
    }
}
