<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ScheduleTasksCommandTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function testProvideTasksCommand()
    {
        $this->artisan('provide:tasks')->assertSuccessful();
        $this->assertDatabaseHas(Task::class, ['id' => 1]);
    }
}
