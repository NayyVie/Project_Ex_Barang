<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'abc@gmail.com'],
            [
                'employee_id' => 'EMP001',
                'name' => 'Budi Santoso',
                'unit' => 'PLN Unit Surabaya',
                'role' => 'worker',
                'password' => Hash::make('123456'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'def@gmail.com'],
            [
                'employee_id' => 'EMP002',
                'name' => 'Siti Aminah',
                'unit' => 'PLN Unit Jakarta',
                'role' => 'worker',
                'password' => Hash::make('789101'),
            ]
        );  
    }
}
