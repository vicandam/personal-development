<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository
{
    public function getAll($filter)
    {
        $query = Task::where('user_id', auth()->id())
            ->orderBy('id', $filter['newest'] === 'true' ? 'desc' : 'asc')
            ->when($filter['completed'] === 'true', function ($query) {
                return $query->where('completed', true);
            })
            ->when($filter['incomplete'] === 'true', function ($query) {
                return $query->where('completed', false);
            })
            ->get(['id', 'title', 'completed']);

        return $query;
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id();

        return Task::create($data)->only(
            'id','title','completed'
        );
    }

    public function find(int $id)
    {
        return Task::findOrFail($id);
    }

    public function update(int $id, array $data)
    {
        $goal = Task::findOrFail($id);
        $goal->update($data);
        return $goal;
    }

    public function delete(int $id)
    {
        $goal = Task::findOrFail($id);
        $goal->delete();
    }
}
