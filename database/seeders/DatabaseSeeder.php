<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'jordan.lee'],
            [
                'name' => 'Jordan Lee',
                'full_name' => 'Jordan Lee',
                'email' => 'jordan.lee@pos.local',
                'password' => Hash::make('password'),
            ],
        );

        User::updateOrCreate(
            ['username' => 'camila.torres'],
            [
                'name' => 'Camila Torres',
                'full_name' => 'Camila Torres',
                'email' => 'camila.torres@pos.local',
                'password' => Hash::make('password'),
            ],
        );

        foreach ([
            ['Ava Santos', 'ava.santos@example.com', '0917-555-0101'],
            ['Liam Cruz', 'liam.cruz@example.com', '0917-555-0102'],
            ['Mia Reyes', 'mia.reyes@example.com', '0917-555-0103'],
        ] as [$fullName, $email, $phone]) {
            Customer::updateOrCreate(
                ['email' => $email],
                ['full_name' => $fullName, 'phone' => $phone],
            );
        }
    }
}
