<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
use App\Models\Student;
class StudentFactory extends Factory
{   
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthdate' => $this->faker->date('Y-m-d'),
            'sex' => $this->faker->randomElement(['MALE', 'FEMALE']),
            'address' => $this->faker->address,
            'year' => $this->faker->numberBetween(1, 5),
            'course' => $this->faker->randomElement(['Computer Science', 'Engineering', 'Mathematics']),
            'section' => $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
