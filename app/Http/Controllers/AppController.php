<?php

namespace App\Http\Controllers;

use App\Services\PlanningService;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public $planningService;
    
    public function __construct()
    {
        if($this->planningService == null){
            $this->planningService = new PlanningService();    
        }
    }


    public function PlanningPage(Request $request)
    {
        return view('job_planning', [
            'devToJobDict' => $this->planningService->PlanToAll()
        ]);
    }
}
