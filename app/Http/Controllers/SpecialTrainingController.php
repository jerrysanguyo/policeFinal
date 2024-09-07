<?php

namespace App\Http\Controllers;

use App\{
    Models\SpecialTraining,
    Models\SpecialCourse,
    Models\SpecialCourseExtension,
    Http\Requests\StoreOrUpdateSpecialTrainingRequest,
    Services\SpecialTrainingService,
    DataTables\UniversalDataTable,
};
use Illuminate\Support\Facades\Auth;

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

    public function storeOrUpdate(StoreOrUpdateSpecialTrainingRequest $request)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $data = $request->validated();
        $this->specialTrainingService->storeOrUpdateSpecialTraining($data, $userId);

        return redirect()->route($userRole . '.dashboard')->with([
            'success'   =>  'Special training saved successfully!',
            'activeTab' =>  'training'
        ]);
    }
}
