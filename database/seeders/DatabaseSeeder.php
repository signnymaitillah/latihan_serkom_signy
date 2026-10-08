<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'id_user'  => (string) Str::uuid(),
            'nama'     => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'role'     => 'admin',
        ]);
    }
}