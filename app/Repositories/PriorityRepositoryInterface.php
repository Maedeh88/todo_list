<?php

namespace App\Repositories;

interface PriorityRepositoryInterface
{
    public function getAll();

    public function findById($id);
}
