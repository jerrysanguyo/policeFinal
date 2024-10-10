<?php

namespace App\Http\Controllers;

use App\{
    Models\SpecialTraining,
    Models\SpecialCourse,
    Models\SpecialCourseExtension,
    Http\Requests\StoreSpecialTrainingRequest,
    Http\Requests\UpdateSpecialTrainingRequest,
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

    public function store(StoreSpecialTrainingRequest $request)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $data = $request->validated();
        $this->specialTrainingService->store($data, $userId);

        return redirect()->route($userRole . '.dashboard')->with([
            'success'   =>  'Special training saved successfully!',
            'activeTab' =>  'training'
        ]);
    }

    public function update(UpdateSpecialTrainingRequest $request, SpecialTraining $training)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $this->specialTrainingService->update($request->validated(), $userId, $training);

        return redirect()->route($userRole . '.dashboard')->with([
            'success'   =>  'Special training saved successfully!',
            'activeTab' =>  'training'
        ]);
    }

    public function destroy(SpecialTraining $training)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $this->specialTrainingService->destroy($training);

        return redirect()->route($userRole . '.dashboard')->with([
            'success'   =>  'Special training deleted successfully!',
            'activeTab' =>  'training'
        ]);
    }
}
