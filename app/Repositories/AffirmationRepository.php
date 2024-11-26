<?php

namespace App\Repositories;

use App\Models\Affirmation;

class AffirmationRepository
{
    public function create($data)
    {
        return Affirmation::create($data);
    }
}
