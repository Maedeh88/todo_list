<?php

namespace App\Services;

use App\Repositories\PriorityRepositoryInterface;

class PriorityService
{
    protected $priorityRepository;

    public function __construct(PriorityRepositoryInterface $priorityRepository)
    {
        $this->priorityRepository = $priorityRepository;
    }


    public function getAll()
    {
        return $this->priorityRepository->getAll();
    }

    public function findById($id)
    {
        return $this->priorityRepository->findById($id);
    }

}
