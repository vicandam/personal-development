<?php

namespace App\Repositories;

use App\Models\Goal;

class GoalRepository
{
    public function getAll()
    {
        return Goal::where('user_id', auth()->id())
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id();

        return Goal::create($data)->only(
            'id','title','description','target_date','progress'
        );
    }

    public function find(int $id)
    {
        return Goal::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $goal = Goal::findOrFail($id);
        $goal->update($data);
        return $goal;
    }

    public function delete(int $id)
    {
        $goal = Goal::findOrFail($id);
        $goal->delete();
    }
}
