<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Support\Facades\Http;

class ApiService
{
    protected $apiSourceUrl;
    protected $apiSource;
    protected $difficultyKey;
    protected $durationKey;

    public function GetTask($jobData)
    {
        $job = new Task();
        // $job->id = $jobData['id'];
        $job->difficulty = $jobData[$this->difficultyKey];
        $job->duration = $jobData[$this->durationKey];
        $job->api_source = $this->apiSource;
        return $job;
    }

    public function GetTasks()
    {
        $apiResponses = Http::get($this->apiSourceUrl)->json(null,"array");
        $jobList = [];
        foreach($apiResponses as $apiResponse){
            $jobList[] = $this->GetTask($apiResponse);
        }
        return $jobList;
    }

}