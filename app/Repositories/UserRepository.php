<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    /**
     * @param $email
     * @return Builder|Model|object|null
     * get a specified user with id
     */
    public function findByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }

    /**
     * @param array $data
     * @return Builder|Model
     * to register a new user in db
     */
    public function register(array $data)
    {
        return User::query()->create($data);
    }

    public function findById($id)
    {
        return User::query()->findOrFail($id);
    }
}
