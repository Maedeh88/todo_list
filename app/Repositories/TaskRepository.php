<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TaskRepository implements TaskRepositoryInterface
{

    /**
     * @return Builder[]|Collection
     * get all tasks of the current user
     */
    public function allUserTasks()
    {
        return Task::query()->where('user_id', Auth::id())->get();
    }

    /**
     * @param array $data
     * @return Builder|Model
     * create a new instance of task
     */
    public function create(array $data)
    {
        return Task::query()->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     * update a specified task
     */
    public function update(array $data, $id)
    {
        $task = $this->findById($id);
        $task->update($data);
        return $task;
    }

    /**
     * @param $id
     * @return void
     * delete specified task
     */
    public function delete($id)
    {
        $task = $this->findById($id);
        $task->delete();
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     * get a specified task by id
     */
    public function findById($id)
    {
        return Task::query()->findOrFail($id);
    }
}
