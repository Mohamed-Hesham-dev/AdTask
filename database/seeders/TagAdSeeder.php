<?php

namespace Database\Seeders;

use App\Models\TagAd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TagAd::factory()->count(1000)->create();
    }
}
