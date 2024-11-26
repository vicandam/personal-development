<?php

namespace App\Http\Controllers;

use App\Repositories\MotivationRepository;
use App\Services\DailyMotivationService;
use App\Services\OpenAIService;
use App\Services\ScheduledEmailService;
use Illuminate\Http\Request;

class MotivationController extends Controller
{
    protected $openaiService;
    private $motivationRepository;
    private $scheduledEmailService;

    public function __construct(
        OpenAIService $openaiService,
        MotivationRepository $motivationRepository,
        ScheduledEmailService $scheduledEmailService
    ) {
        $this->openaiService = $openaiService;
        $this->motivationRepository = $motivationRepository;
        $this->scheduledEmailService = $scheduledEmailService;
    }

    public function generateAndSaveMotivation()
    {
        $this->openaiService->generateMotivation();

        return response()->json(['message' => 'Motivation generated and saved']);
    }

    public function sendMotivation()
    {
        $this->scheduledEmailService->sendScheduledEmails();
    }

    public function emailTemplate()
    {
        $motivationService = new DailyMotivationService();
        $motivation = $motivationService->processMotivationalEmail();
        $user = auth()->user();

        $motivation = preg_replace('/\[(recipient\'?s name|recipient name)\]/i', $user->name, $motivation);
        $content = [
            'motivation' => $motivation,
            'user' => $user->name
        ];

        //dd($content); for testing template
        return view('emails.daily_motivation', compact('content'));
    }
}
