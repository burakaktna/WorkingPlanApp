<?php

namespace App\Console\Commands;

use App\Jobs\ScheduleTasksJob;
use App\Services\ApiProviders\TurkeyTaskProvider;
use App\Services\ApiProviders\USATaskProvider;
use Illuminate\Console\Command;

class ProvideTasksCommand extends Command
{
    protected $signature = 'provide:tasks';

    protected $description = 'Command description';

    public function handle()
    {
        ScheduleTasksJob::dispatch(new TurkeyTaskProvider());
        ScheduleTasksJob::dispatch(new USATaskProvider());
        $this->info("Tasks Provided");
    }
}
