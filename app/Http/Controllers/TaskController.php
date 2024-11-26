<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService= $taskService;
    }
    public function view() {
        return view('task.index');
    }
    public function index(Request $request)
    {
        $filter = $request->filter;
        $goals = $this->taskService->getAll($filter);
        return response()->json($goals);
    }

    public function store(Request $request)
    {
        $data = $request->only('title');
        $goal = $this->taskService->create($data);

        return response()->json($goal, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'completed']);
        $goal = $this->taskService->update($id, $data);
        return response()->json($goal);
    }

    public function destroy($id)
    {
        $this->taskService->delete($id);
        return response()->json(null, 204);
    }
}
