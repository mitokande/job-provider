<?php


function floatToTime($floatHours) {
    $hours = floor($floatHours);
    $minutes = ($floatHours - $hours) * 60;
    
    $minutes = round($minutes);

    return  $minutes != 0 ? "$hours saat $minutes dakika" : "$hours saat ";
}