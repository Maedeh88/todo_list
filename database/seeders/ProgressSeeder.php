<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::query()->create(['title' => 'not started']);
        Progress::query()->create(['title' => 'in progress']);
        Progress::query()->create(['title' => 'completed']);
    }
}
