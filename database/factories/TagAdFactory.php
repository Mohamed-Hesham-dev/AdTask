<?php

namespace Database\Factories;

use App\Models\TagAd;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagAd>
 */
class TagAdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TagAd::class;
    public function definition()
    {
        return [
            'tag_id'=>rand(1,1000),
            'ad_id'=>rand(1,1000)
        ];
    }
}
