<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class VerifyUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        if (!$id)
            $id = $request->input('id');

        $task = Task::query()->findOrFail($id);

        if (!$task) {
            return redirect('/task');
        }

        if (Auth::id() !== $task->user_id) {
            return response()->json(["message" => "You are not authorized to make changes to this task."]);
        }
        return $next($request);
    }

}
