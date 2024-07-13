<?php

namespace App\Repositories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PriorityRepository implements PriorityRepositoryInterface
{

    /**
     * @return Priority[]|Collection
     * get all priorities
     */
    public function getAll()
    {
        return Priority::all();
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     * get specified priority by id
     */
    public function findById($id)
    {
        return Priority::query()->findOrFail($id);
    }
}
