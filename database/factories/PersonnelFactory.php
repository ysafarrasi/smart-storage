<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'personnel_id' => $this->faker->unique()->numberBetween(100000, 999999),
            'loadCellID' => $this->faker->numberBetween(1, 10),
            'nokartu' => $this->faker->creditCardNumber,
            'nama' => $this->faker->unique()->name('male'),
            'pangkat' => $this->faker->jobTitle,
            'nrp' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'jabatan' => $this->faker->jobTitle,
            'kesatuan' => $this->faker->company,
        ];
    }
}

