<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->create(['name' => 'routines']);
        Category::query()->create(['name' => 'home']);
        Category::query()->create(['name' => 'work']);
        Category::query()->create(['name' => 'personal']);
        Category::query()->create(['name' => 'shopping']);
        Category::query()->create(['name' => 'meeting']);
        Category::query()->create(['name' => 'study']);
    }
}
