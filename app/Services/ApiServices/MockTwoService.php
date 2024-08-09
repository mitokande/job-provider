<?php

namespace App\Services\ApiServices;

use App\Services\ApiService;

class MockTwoService extends ApiService
{
    protected $apiSourceUrl = "https://raw.githubusercontent.com/WEG-Technology/mock/main/mock-two";
    protected $apiSource = "MockTwo";
    protected $difficultyKey = "zorluk";
    protected $durationKey = "sure";

}