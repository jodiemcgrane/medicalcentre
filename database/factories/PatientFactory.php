<?php
# @Date:   2021-01-18T13:40:25+00:00
# @Last modified time: 2021-01-18T14:05:03+00:00




namespace Database\Factories;

use App\Models\Patient;
use App\Models\User;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'policy_number' => $this->faker->numberBetween($min = 100000000000, $max = 999999999999) . $this->faker->randomLetter,
            'user_id' => User::factory(),
            'insurance_id' => InsuranceCompany::factory(),
        ];
    }
}
