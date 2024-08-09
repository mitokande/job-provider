<?php

namespace App\Services\ApiServices;

use App\Services\ApiService;

class MockOneService extends ApiService
{
    protected $apiSourceUrl = "https://raw.githubusercontent.com/WEG-Technology/mock/main/mock-one";
    protected $apiSource = "MockOne";
    protected $difficultyKey = "value";
    protected $durationKey = "estimated_duration";

}