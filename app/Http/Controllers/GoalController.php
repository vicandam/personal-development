<?php

namespace App\Http\Controllers;

use App\Services\GoalService;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    private $goalService;

    public function __construct(GoalService $goalService)
    {
        $this->goalService = $goalService;
    }
    public function view()
    {
        return view('goal.index');
    }
    public function index()
    {
        $goals = $this->goalService->getAll();
        return response()->json($goals);
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'description', 'target_date', 'progress']);
        $goal = $this->goalService->create($data);

        return response()->json($goal, 201);
    }

    public function show($id)
    {
        $goal = $this->goalService->find($id);
        return response()->json($goal);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'description', 'target_date','progress']);
        $goal = $this->goalService->update($id, $data);
        return response()->json($goal);
    }

    public function destroy($id)
    {
        $this->goalService->delete($id);
        return response()->json(null, 204);
    }
}
