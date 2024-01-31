<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password'=> Hash::make('login123'),
            'email_verified_at'=>Carbon::now(),
            'access' => true,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password'=> Hash::make('login123'),
            'email_verified_at'=>Carbon::now(),
            'access' => true,
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Master',
            'email' => 'master@example.com',
            'password'=> Hash::make('login123'),
            'email_verified_at'=>Carbon::now(),
            'access' => true,
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);
    }
}
