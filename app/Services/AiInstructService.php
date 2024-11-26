<?php

namespace App\Services;

use App\Models\FineTuning;
use App\Repositories\AiInstructRepository;

class AiInstructService
{
    protected $repository;

    public function __construct() {
        $this->repository = new AiInstructRepository();

    }
    public function getAllByAuthId()
    {
        return $this->repository->getAllByAuthId();
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function createInstruction($data) {
        return $this->repository->create($data);
    }

    public function saveFineTuningDetails($response) {
        FineTuning::create([
            'user_id' => auth()->id(),
            'file_id' => $response->id, // 'file-XjGxS3KTG0uNmNOK362iJua3'
            'object' => $response->object ?? null, // 'file',
            'bytes' => $response->bytes ?? null, // 140,
            'created_at' => $response->createdAt ?? null, // 1613779657,
            'filename' => $response->filename ?? null, // 'mydata.jsonl',
            'purpose' => $response->purpose ?? null, // 'fine-tune',
            'status' => $response->status ?? null, // 'succeeded',
        ]);

        return $response->toArray();
    }

    public function getInstruction($id) {
        return $this->repository->find($id);
    }
    public function delete(int $id)
    {
        $this->repository->delete($id);
    }
}
