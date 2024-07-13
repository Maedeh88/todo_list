<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\CategoryService;
use App\Services\PriorityService;
use App\Services\ProgressService;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class TaskController extends Controller
{
    protected $taskService;
    protected $categoryService;
    protected $progressService;
    protected $priorityService;

    public function __construct(TaskService     $taskService,
                                CategoryService $categoryService,
                                ProgressService $progressService,
                                PriorityService $priorityService)
    {
        $this->taskService = $taskService;
        $this->categoryService = $categoryService;
        $this->progressService = $progressService;
        $this->priorityService = $priorityService;
    }


    /**
     * @return JsonResponse
     * get all tasks of the current user
     */
    public function index()
    {
        $tasks = $this->taskService->allUserTasks();
        return response()->json(['data' => $tasks]);
    }

    /**
     * @return JsonResponse
     * get initial data to start creating a new task
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();
        $progresses = $this->progressService->getAll();
        $priorities = $this->priorityService->getAll();

        return response()->json([
            'categories' => $categories,
            'progresses' => $progresses,
            'priorities' => $priorities
        ]);

    }


    /**
     * @param StoreTaskRequest $request
     * @return JsonResponse
     * store a new task in db
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            $task = $this->taskService->create($request->all());
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['message' => 'An error occurred while saving the task.']);
        }
        return response()->json(['message' => 'The task saved successfully.']);
    }

    /**
     * @param $id
     * @return JsonResponse
     * get data to update a specified task
     */
    public function edit($id)
    {
        $task = $this->taskService->findById($id);
        $categories = $this->categoryService->getAll();
        $progresses = $this->progressService->getAll();
        $priorities = $this->priorityService->getAll();

        return response()->json([
            'task' => $task,
            'categories' => $categories,
            'progresses' => $progresses,
            'priorities' => $priorities
        ]);
    }

    public function update(UpdateTaskRequest $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'progress_id' => $request->progress_id,
            'priority_id' => $request->priority_id,
            'subject' => $request->subject,
            'description' => $request->description
        ];
        try {
            $task = $this->taskService->update($data, $request->input('id'));
        } catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            return response()->json(['message' => 'An error occurred while updating the task.']);
        }
        return response()->json(['message' => 'The task updated successfully.']);
    }

    /**
     * @param $id
     * @return JsonResponse
     * to destroy a specified task
     */
    public function delete($id)
    {
        try {
            $this->taskService->delete($id);
        } catch (\Exception $exception)
        {
            Log::error($exception->getMessage());
            return response()->json(['message' => 'An error occurred while deleting the task.']);
        }
        return response()->json(['message' => 'The task deleted successfully.']);

    }

    /**
     * @param $id
     * @return JsonResponse
     * to show a specified task
     */
    public function show($id)
    {
        $task = $this->taskService->findById($id);
        return response()->json(['data' => $task]);
    }

}
