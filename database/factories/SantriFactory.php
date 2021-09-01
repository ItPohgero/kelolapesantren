<?php

namespace Database\Factories;

use App\Models\Santri;
use Illuminate\Database\Eloquent\Factories\Factory;

class SantriFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Santri::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand = rand(1, 3);
        return [
            'nama'          => $this->faker->name(),
            'code'          => $rand . '-' . rand(1000, 10000),
            'password'      => bcrypt('password'),
            'alamat'        => $this->faker->address(),
            'user_id'       => $rand
        ];
    }
}
