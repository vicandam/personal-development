<?php

namespace App\Repositories;

use App\Models\Motivation;

class MotivationRepository
{
    public function create($data)
    {
        return Motivation::create($data);
    }
}
