<?php

namespace App\Services;

use App\Models\User;
use App\Models\Affirmation;

class UserService
{
    public function getPersonalizedAffirmation(User $user)
    {
        $affirmation = Affirmation::inRandomOrder()->first();

        $personalizedAffirmation = "Hi {$user->name}, {$affirmation->content}";

        return $personalizedAffirmation;
    }
}
