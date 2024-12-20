<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,          // First create users
            OrganizationSeeder::class,  // Then create organizations
            MemberSeeder::class,        // Finally create additional members
        ]);
    }
}
