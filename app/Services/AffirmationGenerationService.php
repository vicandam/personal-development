<?php

namespace App\Services;

class AffirmationGenerationService
{
    protected $openaiService;

    public function __construct(OpenAIService $openaiService)
    {
        $this->openaiService = $openaiService;
    }

    public function generateAffirmation()
    {
        $prompt = "Generate an affirmation to start the day positively.";
        return $this->openaiService->generateText($prompt);
    }
}
