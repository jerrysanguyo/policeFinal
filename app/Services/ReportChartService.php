<?php

namespace App\Services;

use App\Models\{
    SpecialTraining,
    Course,
};
use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class ReportChartService
{
    public function usersPerProgram()
    {
        $usersPerProgram = Course::getUserPerProgram();

        return [
            'title' => 'Number of police officer per program',
            'chartType'  =>  'bar',
            'labels' => $usersPerProgram->pluck('name')->toArray(), 
            'data' => $usersPerProgram->pluck('total_users')->toArray() 
        ];
    }

    public function usersPerTraining()
    {
        $usersPerTraining = SpecialTraining::getUserPerCourse();

        return [
            'title' => 'Number of police officer per training',
            'chartType' =>  'bar',
            'labels' =>  $usersPerTraining->pluck('name')->toArray(),
            'data'  =>  $usersPerTraining->pluck('total_users')->toArray()
        ];
    }
}
