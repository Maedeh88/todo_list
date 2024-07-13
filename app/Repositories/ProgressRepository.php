<?php

namespace App\Repositories;

use App\Models\Progress;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProgressRepository implements ProgressRepositoryInterface
{

    /**
     * @return Progress[]|Collection
     * get all progresses
     */
    public function getAll()
    {
        return Progress::all();
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     * get specified progress by id
     */
    public function findById($id)
    {
        return Progress::query()->findOrFail($id);
    }
}
