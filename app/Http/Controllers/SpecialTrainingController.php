<?php

namespace App\Http\Controllers;

use App\{
    Models\SpecialTraining,
    Models\SpecialCourse,
    Models\SpecialCourseExtension,
    Http\Requests\StoreOrUpdateSpecialTrainingRequests,
    Services\SpecialTrainingService,
    DataTables\UniversalDataTable,
};
use Illuminate\Http\Request;

class SpecialTrainingController extends Controller
{
    protected $specialTrainingService;
    
    public function __construct(SpecialTrainingService $specialTrainingService)
    {
        $this->specialTrainingService = $specialTrainingService;
    }

    public function getAdminTrainings($courseId)
    {
        $trainings = SpecialCourseExtension::getSpecialExtn($courseId);
        return response()->json($trainings);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    
    public function show(SpecialTraining $specialTraining)
    {
        //
    }
    
    public function edit(SpecialTraining $specialTraining)
    {
        //
    }
    
    public function update(Request $request, SpecialTraining $specialTraining)
    {
        //
    }
    
    public function destroy(SpecialTraining $specialTraining)
    {
        //
    }
}
