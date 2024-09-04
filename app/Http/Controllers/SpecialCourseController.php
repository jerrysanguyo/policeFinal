<?php

namespace App\Http\Controllers;

use App\{
    Models\SpecialCourse,
    Services\SpecialCourseService,
    DataTables\UniversalDataTable,
    Http\Requests\StoreOrUpdateSpecialCourseRequest,
};

use Illuminate\Http\Request;

class SpecialCourseController extends Controller
{
    protected $specialCourseService;

    public function __construct(SpecialCourseService $specialCourseService)
    {
        $this->specialCourseService = $specialCourseService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfSpecialCourse = SpecialCourse::getAllSpecial();

        return $dataTable->render('special.index', compact('listOfSpecialCourse'));
    }
    
    public function store(StoreOrUpdateSpecialCourseRequest $request)
    {
        $this->specialCourseService->specialCourseStore($request->validated());

        return redirect()->route('superadmin.special.index')->with(
            'success',
            'Special course added successfully!'
        );
    }
    
    public function edit(SpecialCourse $special)
    {
        return view('special.edit', compact('special'));
    }
    
    public function update(StoreOrUpdateSpecialCourseRequest $request, SpecialCourse $special)
    {
        $this->specialCourseService->specialCourseUpdate($special, $request->validated());

        return redirect()->route('superadmin.special.edit', $special)->with(
            'success',
            'Special course updated successfully!'
        );
    }
    
    public function destroy(SpecialCourse $special)
    {
        $this->specialCourseService->specialCourseDestroy($special);

        return redirect()->route('superadmin.special.index')->with(
            'success',
            'Special course deleted successfully!'
        );
    }
}
