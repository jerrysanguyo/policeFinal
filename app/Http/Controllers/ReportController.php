<?php

namespace App\Http\Controllers;

use App\{
    Models\User,
    Models\SpecialCourse,
    Services\ReportChartService,
};
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
        $listOfCourse = SpecialCourse::getAllSpecial();
        // uncomment if they want to see one by one graph.
        // $userInvestigation = $this->reportChart->userInvestigation();
        // $userIntelligence = $this->reportChart->userIntelligence();
        // $userOperation = $this->reportChart->userOperation();
        // $userAdministrative = $this->reportChart->userAdministrative();
        // $userPcr = $this->reportChart->userPcr();

        return view('report.chart', compact(
            'usersPerProgram',
            'usersPerCourse',
            'listOfCourse',
            // uncomment if they want to see one by one graph
            // 'userInvestigation',
            // 'userIntelligence',
            // 'userOperation',
            // 'userAdministrative',
            // 'userPcr',
        ));
    }

    public function getCourseData(Request $request)
    {
        try {
            $courseId = $request->input('course_id');

            if (!$courseId) {
                return response()->json(['error' => 'Course ID is required'], 400);
            }

            $data = $this->reportChart->userTraining($courseId);
            
            if (empty($data['labels']) || empty($data['data'])) {
                $data['labels'] = [];
                $data['data'] = [];
            }

            return response()->json($data);
        } catch (\Exception $e) {
            \Log::error('Error in getCourseData: ' . $e->getMessage());
            return response()->json(['error' => 'Server error occurred'], 500);
        }
    }

}
