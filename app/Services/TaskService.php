<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAll($filter)
    {
        return $this->taskRepository->getAll($filter);
    }

    public function create(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function find(int $id)
    {
        return $this->taskRepository->find($id);
    }

    public function update(int $id, array $data)
    {
        return $this->taskRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->taskRepository->delete($id);
    }
}
