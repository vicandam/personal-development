<?php

namespace Tests\Feature;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class GoalControllerTest extends TestCase
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

    public function test_can_get_all_goals()
    {
        $response = $this->get('/goals');
        $response->assertStatus(200)
            ->assertJsonCount(0);
    }
    public function test_can_create_a_goal()
    {
        $data = [
            'user_id' => auth()->id(),
            'title' => 'Learn Laravel',
            'description' => 'Master Laravel framework',
            'target_date' => '2023-12-31',
            'progress' => 30,
        ];

        $response = $this->post('/goals', $data);
        $response->assertStatus(201);
    }
    public function test_can_show_a_goal()
    {
        $goal = Goal::factory()->create();

        $response = $this->get("/goals/{$goal->id}");
        $response->assertStatus(200);
    }
    public function test_can_update_a_goal()
    {
        $goal = Goal::factory()->create(); // Assuming you have a Goal model and factory set up

        $data = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'completed' => true,
            'target_date' => '2023-12-31',
            'progress' => 50,
        ];

        $response = $this->put("/goals/{$goal->id}", $data); // Replace with your update endpoint
        $response->assertStatus(200);

        // You can add additional assertions to check the updated data if needed
    }
    public function test_can_delete_a_goal()
    {
        $goal = Goal::factory()->create();

        $response = $this->delete("/goals/{$goal->id}");
        $response->assertStatus(204);

        $this->assertDatabaseMissing('goals', ['id' => $goal->id]);
    }
}
