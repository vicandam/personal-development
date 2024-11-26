<?php

namespace App\Services;

use App\Repositories\GoalRepository;

class GoalService
{
    private $goalRepository;

    public function __construct(GoalRepository $goalRepository)
    {
        $this->goalRepository = $goalRepository;
    }

    public function getAll()
    {
        return $this->goalRepository->getAll();
    }

    public function create(array $data)
    {
        return $this->goalRepository->create($data);
    }

    public function find(int $id)
    {
        return $this->goalRepository->find($id);
    }

    public function update(int $id, array $data)
    {
        return $this->goalRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->goalRepository->delete($id);
    }
}
