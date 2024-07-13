<?php

namespace App\Repositories;

interface ProgressRepositoryInterface
{
    public function getAll();

    public function findById($id);
}
