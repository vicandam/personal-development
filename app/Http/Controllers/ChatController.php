<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI;
use Throwable;

class ChatController extends Controller
{
    public function generateResponse(Request $request)
    {
        $client = OpenAI::client(config('app.open_ai_token'));

        $response = $client->chat()->create([
            'model' => 'gpt-4',
            'messages' => [
                ['role' => 'user', 'content' => $request->post('content')],
            ],
        ]);

        $isCodeBlock = false; // Initialize the code block detection flag
        $gpt_response = '';
        foreach ($response->choices as $result) {
            $message = $result->message->content;
            $gpt_response .= $message;

            // Define a regular expression pattern to identify code blocks enclosed in triple backticks
            $codeBlockPattern = '/```[\s\S]*?```/';

            // Check if the current message contains a code block
            if (!$isCodeBlock && preg_match($codeBlockPattern, $message)) {
                $isCodeBlock = true;
            }
        }

        return [
            'content' => $gpt_response,
            'isCodeBlock' => $isCodeBlock
        ];
    }
    public function index()
    {
        return view('chat.index');
    }
}
