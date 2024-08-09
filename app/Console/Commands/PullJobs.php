<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Services\ApiServices\MockOneService;
use App\Services\ApiServices\MockTwoService;
use Illuminate\Console\Command;

class PullJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:pull-jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull Job Data From APIs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $jobs = [];
        $mockOne = new MockOneService();
        $mockOne = $mockOne->GetTasks();
        // array_push($jobs, $mockOne->GetJobs());
        $mockTwo = new MockTwoService();
        $mockTwo = $mockTwo->GetTasks();
        $jobs = array_merge($mockOne,$mockTwo);
        foreach($jobs as $job){
            $job->save();
        }
    }
}
