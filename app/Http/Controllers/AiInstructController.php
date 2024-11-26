<?php

namespace App\Http\Controllers;

use App\Services\AiInstructService;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AiInstructController extends Controller
{
    protected $aiInstructService;
    private $openAiService;

    public function __construct(AiInstructService $aiInstructService,OpenAIService $openAiService) {
        $this->aiInstructService = $aiInstructService;
        $this->openAiService = $openAiService;
    }

    public function list()
    {
        return view('ai_instructions.list');
    }

    public function loadDataset()
    {
        $dataPath = 'motivational_email_fine_tuning.jsonl'; // Relative path within the storage/app directory
        $dataset = [];

        // Load the dataset
        if (Storage::exists('storage\app\motivational_email_fine_tuning.jsonl')) {
            $contents = Storage::get($dataPath);
            $lines = explode("\n", $contents);

            foreach ($lines as $line) {
                if (!empty($line)) {
                    $dataset[] = json_decode($line, true);
                }
            }

            // Initial dataset stats
            $numExamples = count($dataset);
            $firstExample = $dataset[0];

            // You can return this data or perform any other actions you need.
            return compact('numExamples', 'firstExample');
        } else {
            return "Dataset file not found.";
        }
    }
    public function loadDatasetTest()
    {
        $dataPath1 = 'fine_tune_data_formatted.jsonl'; // Relative path within the storage/app directory

        // Load the dataset
        if (Storage::disk('local')->exists($dataPath1)) {

            $contents1 = Storage::disk('local')->get($dataPath1);
            $lines1 = explode("\n", $contents1);

            foreach ($lines1 as $line) {

                if (!empty($line)) {
                    $dataset[] = json_decode($line, true);
                }
            }

            // Initial dataset stats
            $numExamples = count($dataset);
            $firstExample = $dataset[0];

            $this->checkFormat($dataset);
            // You can return this data or perform any other actions you need.
            return compact('numExamples', 'firstExample');
        } else {
            return "Dataset file not found.";
        }
    }
    public function checkFormat($dataset)
    {
        // Initialize an associative array for format errors
        $formatErrors = [];

        // Loop through the dataset
        foreach ($dataset as $ex) {
            // Check if the element is not a dictionary
            if (!is_array($ex)) {
                $formatErrors['data_type'] += 1;
                continue;
            }

            // Get the 'messages' list from the element
            $messages = $ex['messages'] ?? null;

            // Check if 'messages' is missing
            if ($messages === null) {
                $formatErrors['missing_messages_list'] += 1;
                continue;
            }

            // Loop through the messages list
            foreach ($messages as $message) {
                // Check if 'role' and 'content' keys are missing
                if (!array_key_exists('role', $message) || !array_key_exists('content', $message)) {
                    $formatErrors['message_missing_key'] += 1;
                }

                // Check for unrecognized keys in the message
                $allowedKeys = ['role', 'content', 'name', 'function_call'];
                foreach (array_keys($message) as $key) {
                    if (!in_array($key, $allowedKeys)) {
                        $formatErrors['message_unrecognized_key'] += 1;
                    }
                }

                // Check if 'role' is unrecognized
                $allowedRoles = ['system', 'user', 'assistant', 'function'];
                if (!in_array($message['role'], $allowedRoles)) {
                    $formatErrors['unrecognized_role'] += 1;
                }

                // Get 'content' and 'function_call' from the message
                $content = $message['content'] ?? null;
                $functionCall = $message['function_call'] ?? null;

                // Check if 'content' is missing or not a string
                if (($content === null && $functionCall === null) || !is_string($content)) {
                    $formatErrors['missing_content'] += 1;
                }
            }

            // Check if there is at least one 'assistant' message in the messages list
            if (!in_array('assistant', array_column($messages, 'role'))) {
                $formatErrors['example_missing_assistant_message'] += 1;
            }
        }

        // Check for format errors and return a response
        if (!empty($formatErrors)) {
            return response()->json(['errors' => $formatErrors]);
        } else {
            return response()->json(['message' => 'No errors found']);
        }
    }
    public function fineTuneUpload() {
        /* for testing
        $dataPath = 'fine_tune_data_formatted.jsonl'; // Relative path within the storage/app directory
        $contents = Storage::disk('local')->get($dataPath);
        $lines = explode("\n", $contents);
        $data = $this->loadDatasetTest(); */

        $filePath = storage_path('app/fine_tune_data_formatted.jsonl');

        $response = $this->openAiService->fineTuneUpload($filePath);

        if ($response->object == 'file') {

            return $this->aiInstructService->saveFineTuningDetails($response);
        } else {

            dd('File upload failed. Error: ' . $response->error->message);
        }
    }

    public function fineTuneCreate()
    {
        $result = $this->openAiService->crateFineTuneModelJob();

        return response()->json($result, 200);
    }

    public function index()
    {
        $instructions = $this->aiInstructService->getAllByAuthId();
        return response()->json($instructions);
    }

    function store(Request $request) {
        $data = $request->validate([
            'coach_name' => 'required|string',
            'topic' => 'required|string',
            'instruction' => 'required|string'
        ]);

        $instruction = $this->aiInstructService->createInstruction($data);

        return response()->json($instruction, 201);
    }

    public function show($id) {
        $instruction = $this->aiInstructService->getInstruction($id);

        if (!$instruction) {
            return response()->json(['message' => 'Instruction not found'], 404);
        }

        return response()->json($instruction, 200);
    }

    public function destroy($id) {
        $this->aiInstructService->delete($id);
        return response()->json(null, 204);
    }
}
