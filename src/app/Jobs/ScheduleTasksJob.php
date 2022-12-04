<?php

namespace App\Jobs;

use App\Models\Task;
use App\Services\Contracts\TaskProviderContract;
use Cache;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScheduleTasksJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private TaskProviderContract $taskProvider;

    public function __construct(TaskProviderContract $taskProvider)
    {
        $this->taskProvider = $taskProvider;
    }

    public function handle()
    {
        $tasks = $this->taskProvider->getTasks();
        foreach ($tasks as $task) {
            Task::firstOrCreate($task);
        }
        Cache::forget('calculator');
    }
}
