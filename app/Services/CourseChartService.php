<?php

namespace App\Services;

use App\Models\Course;
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class CourseChartService
{
    public function usersPerProgram()
    {
        $usersPerProgram = Course::getUserPerProgram();

        return [
            'title' => 'Number of users per program',
            'labels' => $usersPerProgram->pluck('name')->toArray(), 
            'data' => $usersPerProgram->pluck('total_users')->toArray() 
        ];
    }
}
