<?php

namespace App\Console;

use App\Http\Controllers\MotivationController;
use App\Services\OpenAIService;
use App\Services\ScheduledEmailService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(function () {
            $scheduledEmailService  = new ScheduledEmailService();

            $scheduledEmailService->sendScheduledEmails();
        })
            ->timezone('Asia/Manila')
            ->twiceDaily(5,17);  // Schedule at 5:00 AM and 5:00 PM

        $schedule->call(function () {
            $openAiService = new OpenAIService();

            $openAiService->generateMotivation();
        })
            ->timezone('Asia/Manila')
            ->twiceDaily(4,16);  // Schedule at 4:00 AM and 4:00 PM
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
