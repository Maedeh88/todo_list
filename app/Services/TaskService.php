<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function allUserTasks()
    {
        return $this->taskRepository->allUserTasks();
    }

    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->taskRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->taskRepository->delete($id);
    }

    public function findById($id)
    {
        return $this->taskRepository->findById($id);
    }
}
