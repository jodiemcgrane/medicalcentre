<?php
# @Date:   2021-01-18T13:40:06+00:00
# @Last modified time: 2021-01-18T14:04:18+00:00




namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_started' => $this->faker->date('Y-m-d', '1999-01-01', '2021-01-01'),
            'user_id' => User::factory()
        ];
    }
}
