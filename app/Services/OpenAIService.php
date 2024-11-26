<?php

namespace App\Services;

use App\Models\AiInstruction;
use App\Models\User;
use App\Repositories\MotivationRepository;
use OpenAI;
use Illuminate\Support\Facades\Log;

class OpenAIService
{
    protected $token;
    private $aiInstruct;
    private $motivationRepository;
    private $client;

    public function __construct()
    {
        $this->aiInstruct = new AiInstructService();
        $this->motivationRepository = new MotivationRepository();
        $this->client = OpenAI::client(config('app.open_ai_token'));
    }

    public function generateText($prompt, $model = 'gpt-3.5-turbo-instruct', $temperature = 0.2, $maxTokens = 2000)
    {
        // Adjust these parameters based on the needs
        // $temperature - Lower values for deterministic output
        // $maxTokens - Adjust based on expected response length

        $response = $this->client->completions()->create([
            'model' => $model,
            'prompt' => $prompt,
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
        ]);

        return $response->choices[0]->text;
    }
    private function randomMotivation() {
        $firstAdmin = User::with('settings')->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        })->first();

        return $firstAdmin->settings->random_motivation;
    }
    public function generateMotivation()
    {
        try {
            $model = 'ft:gpt-3.5-turbo-0613:personal::8A7pZmmR';
            $temperature = 0.95;
            $maxTokens = 2000;

            $instructions = $this->aiInstruct->getAll();
            $instructions = $instructions->take(1); // only one for now

            if ($this->randomMotivation()) {
                $instructions = AiInstruction::inRandomOrder()->first();
            }

            foreach ($instructions as $instruction) {
                $response = $this->client->chat()->create([
                    'model' => $model,
                    'messages' => [["role" => "user","content" => $instruction->instruction]],
                    'temperature' => $temperature,
                    'max_tokens' => $maxTokens,
                ]);

                $content = $response->choices[0]->message->content;

                /* use this for non fined tuned gpt model
                $response = $this->client->completions()->create([
                    'model' => $model,
                    'prompt' => $instruction->instruction,
                    'temperature' => $temperature,
                    'max_tokens' => $maxTokens,
                ]);

                $content = $response->choices[0]->text;
                */

                $this->motivationRepository->create(['content' => $content]);
            }

            Log::info('Successfully generated motivation');
        } catch (\Exception $exception) {
            Log::error(('Exception in generateMotivation: ' . $exception->getMessage()));
        }
    }

    public function fineTuneUpload($filePath) {

        return $this->client->files()->upload([
            'purpose' => 'fine-tune',
            'file' => fopen($filePath, 'r'),
        ]);
    }

    public function crateFineTuneModelJob()
    {
        $response = $this->client->fineTuning()->createJob([
            'training_file' => 'file-GIDwjDEKOBA5GqMmYPQ3AqoJ',
            'model' => 'gpt-3.5-turbo',
            'validation_file' => null,
            'hyperparameters' => [
                'n_epochs' => 4,
            ],
            'suffix' => null,
        ]);

        return $response->toArray();
    }
}
