<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    //
    public $apiService;

    public function __construct()
    {
        if($this->apiService == null){
            $this->apiService = new ApiService();    
        }
    }


    public function PlanningPage(Request $request)
    {
        // dd($this->apiService->PlanForFastest());
        return view('job_planning', [
            'devToJobDict' => $this->apiService->PlanToAll()
        ]);
    }
}
