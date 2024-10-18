<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CourseChartService;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    protected $chartService;

    public function __construct(CourseChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    public function showUsersPerProgramChart()
    {
        $usersPerProgram = $this->chartService->usersPerProgram();

        return view('components.chart', compact('usersPerProgram'));
    }
}
