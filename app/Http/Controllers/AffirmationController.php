<?php

namespace App\Http\Controllers;

use App\Services\AffirmationGenerationService;
use App\Repositories\AffirmationRepository;

class AffirmationController extends Controller
{
    protected $affirmationGenerationService;
    protected $affirmationRepository;

    public function __construct(
        AffirmationGenerationService $affirmationGenerationService,
        AffirmationRepository $affirmationRepository
    ) {
        $this->affirmationGenerationService = $affirmationGenerationService;
        $this->affirmationRepository = $affirmationRepository;
    }

    public function generateAndSaveAffirmation()
    {
        $affirmationText = $this->affirmationGenerationService->generateAffirmation();

        $this->affirmationRepository->create(['content' => $affirmationText]);

        return response()->json(['message' => 'Affirmation generated and saved']);
    }
}
