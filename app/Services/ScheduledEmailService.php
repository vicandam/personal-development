<?php

namespace App\Services;

use App\Jobs\SendDailyMotivationEmail;
use App\Models\User;

class ScheduledEmailService
{
    public function sendScheduledEmails()
    {
        $users = User::where('email','vicajobs@gmail.com')->get();
        $motivationService = new DailyMotivationService();
        $motivation =  $motivationService->processMotivationalEmail();
        
        foreach ($users as $user) {
            // Determine which email to send based on user preferences
            if ($user->wantsDailyMotivationEmail()) {
                dispatch(new SendDailyMotivationEmail($user, $motivation));
            } else {

                // testing send email dev only for now
                dispatch(new SendDailyMotivationEmail($user, $motivation));

                // Ongoing implementation
                // dispatch(new SendDailyProgressEmail($user));
            }
        }
    }
}
