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
        $email = 'company@techswivel.com';

        // Check if company already exists by email
        if (!Company::where('email', $email)->exists()) {
            Company::create([
                'name'    => 'TechSwivel Company',
                'email'   => $email,
                'website' => 'https://techswivel.com',
            ]);
        }
    }
}
