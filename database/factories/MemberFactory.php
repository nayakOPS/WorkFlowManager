<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;
use App\Models\User;
use App\Models\Organization;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'role' => $this->faker->randomElement([0, 1, 2, 3]),  // Random role
            'user_id' => User::factory(),  // Creates a user and uses its ID
            'org_id' => Organization::factory(),  // Creates an organization and uses its ID
            'status' => $this->faker->randomElement([0, 1, 2]),  // Random status
        ];
    }
}
