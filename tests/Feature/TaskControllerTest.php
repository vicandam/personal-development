<?php


use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class TaskControllerTest extends TestCase
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
    public function test_can_get_all_task_with_filter()
    {
        $filter['filter'] = [
            "newest" => false,
            "oldest" => true,
            "completed" => false,
            "incomplete" => true,
            "all" => false,
        ];

        // Send a GET request to '/tasks' with the filter as query parameters
        $response = $this->get('/tasks?' . http_build_query($filter));

        // Assert the response status code and the expected JSON structure
        $response->assertStatus(200)
            ->assertJsonCount(0);
    }

    public function test_can_create_a_task()
    {
        $data = [
            'title' => 'Learn Laravel',
            'completed' => false
        ];

        $response = $this->post('/tasks', $data);
        $response->assertStatus(201);
    }
    public function test_can_update_a_task()
    {
        $task = Task::factory()->create();
        $data = [
            'title' => 'Updated Title',
            'completed' => true,
        ];

        $response = $this->put("/tasks/{$task->id}", $data);
        $response->assertStatus(200);
    }
    public function test_can_delete_a_task()
    {
        $task = Task::factory()->create();
        $response = $this->delete("/tasks/{$task->id}");
        $response->assertStatus(204);

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
