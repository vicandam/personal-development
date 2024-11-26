<?php

namespace App\Jobs;

use App\Mail\DailyMotivation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendDailyMotivationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $motivation;
    /**
     * Create a new job instance.
     */
    public function __construct($user, $motivation)
    {
        $this->user = $user;
        $this->motivation = $motivation;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $timezone = $this->user->getTimezone();
        $scheduledTime = $this->user->getScheduledTime();

        $motivation = preg_replace('/\[(recipient\'?s name|recipient name)\]/i', $this->user->name, $this->motivation);
        $content = [
            'motivation' => $motivation,
            'user' => $this->user->name
        ];

        // Check if it's the scheduled time in the user's timezone
        if (now($timezone)->format('H:i:s') === $scheduledTime) {

            // Replace with your motivation email logic
            Mail::to($this->user->email)->send(new DailyMotivation($content));
        } else {
            // testing email
            Mail::to($this->user->email)->send(new DailyMotivation($content));
        }
    }

}
