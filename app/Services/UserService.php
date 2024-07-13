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
     * @param $id
     * @return mixed
     * get a user by id
     */
    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    /**
     * @param $email
     * @return mixed
     * get a user by email
     */
    public function findByEmail($email)
    {
        return $this->userRepository->findByEmail($email);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function register($data)
    {
        return $this->userRepository->register($data);
    }

}
