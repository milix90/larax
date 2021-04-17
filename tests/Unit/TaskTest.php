<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_create_new_task()
    {
        $task = new Task();
        $task->create([
            'title' => 'unit test',
            'description' => 'unit test',
            'user_id' => 1,
            'assign_id' => 1
        ]);

        $this->assertTrue(!!$task);
    }
}
