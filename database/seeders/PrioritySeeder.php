<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::query()->create(['title' => 'high']);
        Priority::query()->create(['title' => 'medium']);
        Priority::query()->create(['title' => 'low']);

    }
}
