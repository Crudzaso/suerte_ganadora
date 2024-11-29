<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): Void
    {
        User::create([
            'name' => 'testAdmin',
            'email' => 'test@admin.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123456789'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('admin');

        User::create([
            'name' => 'testUser',
            'email' => 'test@user.com',
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('123456789'),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            'current_team_id' => null,
        ])->assignRole('client');

        User::factory(20)->create();
    }
}
