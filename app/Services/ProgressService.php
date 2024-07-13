<?php

namespace App\Services;

use App\Repositories\ProgressRepositoryInterface;

class ProgressService
{
    protected $progressRepository;

    public function __construct(ProgressRepositoryInterface $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }


    public function getAll()
    {
        return $this->progressRepository->getAll();
    }

    public function findById($id)
    {
        return $this->progressRepository->findById($id);
    }
}
