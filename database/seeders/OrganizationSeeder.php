<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Member;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 organizations with members
        Organization::factory()
            ->has(Member::factory()->count(5), 'members')  // Using the relationship name
            ->count(20)
            ->create();
    }
}
