<?php

namespace App\Repositories;

use App\Models\AiInstruction;

class AiInstructRepository
{
    public function getAllByAuthId()
    {
        $user = auth()->user();

        return $user->aiInstructions()
            ->orderBy('id', 'desc')
            ->get(['id', 'coach_name', 'topic', 'instruction', 'created_at']);
    }
    public function getAll()
    {
        return AiInstruction::orderBy('id', 'desc')
            ->get(['id', 'instruction', 'created_at']);
    }
    public function create($data) {
        $data['user_id'] = auth()->id();

        return AiInstruction::create($data);
    }
    public function find($id) {
        return AiInstruction::find($id);
    }
    public function delete(int $id)
    {
        $goal = AiInstruction::findOrFail($id);
        $goal->delete();
    }
}
