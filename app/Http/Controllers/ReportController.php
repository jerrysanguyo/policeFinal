<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ReportChartService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $reportChart;

    public function __construct(ReportChartService $reportChart)
    {
        $this->reportChart = $reportChart;
    }

    public function showUsersPerProgramChart()
    {
        $usersPerProgram = $this->reportChart->usersPerProgram();
        $usersPerCourse = $this->reportChart->usersPerCourse();
        $userInvestigation = $this->reportChart->userInvestigation();
        $userIntelligence = $this->reportChart->userIntelligence();
        $userOperation = $this->reportChart->userOperation();

        return view('components.chart', compact(
            'usersPerProgram',
            'usersPerCourse',
            'userInvestigation',
            'userIntelligence',
            'userOperation',
        ));
    }
}
