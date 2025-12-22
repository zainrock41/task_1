<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Company::create([
            'name'    => 'TechSwivel Company',
            'email'   => 'Company@techswivel.com',
            'website' => 'https://TechSwivel.com',
        ]);
    }
}
