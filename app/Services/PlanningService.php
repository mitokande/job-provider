<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\Task;

class PlanningService
{
    public function PlanToAll()
    {
        $developers = Developer::all()->toArray();
        $jobs = Task::all()->toArray();
        $developerToJobDict = [];
        
        usort($jobs, function($b, $a) {
            return $a['difficulty'] * $a['duration'] <=> $b['difficulty'] * $b['duration'] ;
        });

        foreach($jobs as $job){
            $work = $job['duration'] * $job['difficulty'];
            //sort developers by the left working time if they were to get assigned with the current task
            //we are trying to find a developer who can finish the task fairly quick and we also try to make sure 
            //that we distrubute the work fairly among the developers by taking into account their left weekly working hours
            usort($developers, function($a, $b) use($work) {
                return $b['weekly_hours'] - ($work / $b['hourly_rate']) <=> $a['weekly_hours'] - ( $work / $a['hourly_rate']);
            });

            if( $developers[0]['weekly_hours'] * $developers[0]['hourly_rate'] < $work){
                break;
            }

            $developerToJobDict[$developers[0]['id']][] = $job;
            $developers[0]['weekly_hours'] -= $work / $developers[0]['hourly_rate'];
            
        }
        return $developerToJobDict;

    }
}