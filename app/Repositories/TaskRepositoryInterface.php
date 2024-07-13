<?php

namespace App\Repositories;

interface TaskRepositoryInterface
{
    public function allUserTasks();

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function findById($id);

}
