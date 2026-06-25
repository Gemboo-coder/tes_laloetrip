<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@laloetrip.com',
            ],
            [
                'name' => 'Admin LaloeTrip',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'can_review' => true,
            ]
        );
    }
}