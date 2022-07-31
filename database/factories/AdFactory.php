<?php

namespace Database\Factories;

use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ad::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'type' => $this->faker->randomElement(['free','paied']),
            'description' => $this->faker->Text(),
            'ad' => $this->faker->name(),
            'start_date' =>  $this->faker->date('Y-m-d'),
            'category_id'=>rand(1,1000),
        ];
    }
}
