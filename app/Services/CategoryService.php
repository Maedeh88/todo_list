<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }
}
