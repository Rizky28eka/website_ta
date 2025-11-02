<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin1',
            'name' => 'Putri',
            'email' => 'putri@gmail.com',
            'role' => 'admin', // pastikan kolom role ada
            'password' => Hash::make('12345678'), // password aman
            'telepon' => '081234567890',
        ]);
    }
}
