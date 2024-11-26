<?php

namespace Tests\Feature;

use App\Models\AiInstruction;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AiInstructControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user and authenticate them
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $this->actingAs($user);
    }

    public function test_store_ai_instruction() {
        $instruction = AiInstruction::factory()->create([
            'coach_name' => 'Jim Rohn',
            'topic' => 'Personal development',
            'instruction' => 'Sample instructions blah blah blah...',
        ]);

        $response = $this->post('/admin/ai-instructions', [
            'coach_name' => $instruction->coach_name,
            'topic' => $instruction->topic,
            'instruction' => $instruction->instruction
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('ai_instructions', [
            'coach_name' => 'Jim Rohn',
        ]);
    }

    public function test_get_ai_instruction() {
        $instruction = AiInstruction::factory()->create();

        $response = $this->get("/admin/ai-instructions/{$instruction->id}");

        $response->assertStatus(200);
        $response->assertJsonStructure(['id', 'coach_name', 'topic', 'instruction', 'created_at', 'updated_at']);
    }

    public function test_get_all_ai_instructions() {
        AiInstruction::factory(3)->create(); // Create 3 AI instructions for testing

        $response = $this->get('/admin/ai-instructions');

        $response->assertStatus(200);
        $response->assertJsonCount(3); // Assuming you created 3 instructions
        $response->assertJsonStructure([
            '*' => ['id', 'coach_name', 'topic', 'instruction', 'created_at'],
        ]);
    }
    public function test_get_all_by_auth_id()
    {
        // Authenticate a user or create a user as needed
        $user = User::factory(1)->create()->first();

        // Log in the user
        $this->actingAs($user);

        // Create AI instructions for the user
        AiInstruction::factory(3)->create(['user_id' => $user->id]); // Create 3 AI instructions for testing

        // Call the getAllByAuthId method
        $response = $this->get('/admin/ai-instructions'); // Replace with the actual route

        // Assert that the response is successful
        $response->assertStatus(200);

        // Assert that the response contains the expected data
        $response->assertJsonStructure([
            '*' => [
                'id',
                'coach_name',
                'topic',
                'instruction',
                'created_at',
            ],
        ]);
    }
    public function test_can_delete_instruction()
    {
        $instruct = AiInstruction::factory()->create();

        $response = $this->delete("/admin/ai-instructions/{$instruct->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('ai_instructions', ['id' => $instruct->id]);
    }

}
