<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function findByUserName($user_name);

}
