<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\M_resi>
 */
class M_resiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice'   => fake()->name(),
            'awb'       => Str::random(10),
            'logistic'  => 'Shopee Xpress',
            'warehouse' => 'DutaMas',
            'status'    => rand(0, 1),
        ];
    }
}
