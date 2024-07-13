<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $user_name
     * @return mixed
     */
    public function findByUserName($user_name)
    {
        return $this->userRepository->findByUserName($user_name);
    }

}
