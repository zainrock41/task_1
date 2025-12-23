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
        $employees = [
            [
                'firstName' => 'Muhammad',
                'lastName'  => 'Zain',
                'companyId' => 1,
                'email'     => 'zain@techswivel.com',
                'phone'     => '03001234567',
            ],
            [
                'firstName' => 'Ali',
                'lastName'  => 'Raza',
                'companyId' => 1,
                'email'     => 'aliraza@techswivel.com',
                'phone'     => '03007654321',
            ],
        ];

        foreach ($employees as $employee) {
            if (!Employee::where('email', $employee['email'])->exists()) {
                Employee::create($employee);
            }
        }
    }
}
