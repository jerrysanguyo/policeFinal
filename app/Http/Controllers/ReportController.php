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
        $usersPerTraining = $this->reportChart->usersPerTraining();

        return view('components.chart', compact(
            'usersPerProgram',
            'usersPerTraining'
        ));
    }
}
