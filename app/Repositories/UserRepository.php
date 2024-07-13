<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @param $user_name
     * @return Builder|Builder[]|Collection|User|null
     * get a specified user with id
     */
    public function findByUserName($user_name)
    {
        return User::query()->where('username', $user_name)->first();
    }
}
