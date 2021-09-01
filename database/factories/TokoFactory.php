<?php

namespace Database\Factories;

use App\Models\Toko;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TokoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Toko::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hash'      => date('dmy') . Str::random(8),
            'nama'      => $this->faker->sentence(3),
            'pin'       => Str::random(5),
            'pemilik'   => $this->faker->name(),
            'phone'     => $this->faker->phoneNumber(),
            'user_id'   => 1
        ];
    }
}
