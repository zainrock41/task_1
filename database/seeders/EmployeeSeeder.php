<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Employee::create([
            'firstName' => 'Muhammad',
            'lastName'  => 'Zain',
            'companyId' => 1,
            'email'     => 'Zain@techswivel.com',
            'phone'     => '03001234567',
        ]);

        Employee::create([
            'firstName' => 'Ali',
            'lastName'  => 'Raza',
            'companyId' => 1,
            'email'     => 'AliRaza@techswivel.com',
            'phone'     => '03007654321',
        ]);
    }
}
