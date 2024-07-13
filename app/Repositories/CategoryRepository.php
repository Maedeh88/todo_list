<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * @return Category[]|Collection
     * get all categories
     */
    public function getAll()
    {
        return Category::all();
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     * get specified category by id
     */
    public function findById($id)
    {
        return Category::query()->findOrFail($id);
    }
}
