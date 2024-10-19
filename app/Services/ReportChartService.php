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

    public function usersPerCourse()
    {
        $usersPerCourse = SpecialTraining::getUserPerCourse();

        return [
            'title' => 'Number of police officer per course',
            'chartType' =>  'bar',
            'labels' =>  $usersPerCourse->pluck('name')->toArray(),
            'data'  =>  $usersPerCourse->pluck('total_users')->toArray()
        ];
    }
    public function userInvestigation()
    {
        $userInvestigation = SpecialTraining::getUserInvestigation();

        return [
            'title' => 'Investigation Course',
            'chartType' =>  'pie',
            'labels' =>  $userInvestigation->pluck('name')->toArray(),
            'data'  =>  $userInvestigation->pluck('total_users')->toArray()
        ]; 
    }

    public function userIntelligence()
    {
        $userIntelligence = SpecialTraining::getUserIntelligence();

        return [
            'title' => 'Intelligence Course',
            'chartType' =>  'pie',
            'labels' =>  $userIntelligence->pluck('name')->toArray(),
            'data'  =>  $userIntelligence->pluck('total_users')->toArray()
        ]; 
    }

    public function userOperation()
    {
        $userOperation = SpecialTraining::getUserOperation();

        return [
            'title' => 'Operational Course',
            'chartType' =>  'pie',
            'labels' =>  $userOperation->pluck('name')->toArray(),
            'data'  =>  $userOperation->pluck('total_users')->toArray()
        ];
    }

    public function userAdministrative()
    {
        $userAdministrative = SpecialTraining::getUserAdministrative();

        return [
            'title' => 'Administrative Course',
            'chartType' =>  'pie',
            'labels' =>  $userAdministrative->pluck('name')->toArray(),
            'data'  =>  $userAdministrative->pluck('total_users')->toArray()
        ];
    }

    public function userPcr()
    {
        $userPcr = SpecialTraining::getUserPcr();

        return [
            'title' => 'Pcr Course',
            'chartType' =>  'pie',
            'labels' =>  $userPcr->pluck('name')->toArray(),
            'data'  =>  $userPcr->pluck('total_users')->toArray()
        ];
    }
}
