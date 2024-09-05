<?php

namespace App\Http\Controllers;

use App\{
    Models\SpecialCourse,
    Models\SpecialCourseExtension,
    Http\Requests\StoreOrUpdateSpecialCourseExtnRequest,
    DataTables\UniversalDataTable,
    Services\SpecialCourseExtnService,
};
use Illuminate\Http\Request;

class SpecialCourseExtnController extends Controller
{
    protected $specialCourseExtnService;

    public function __construct(SpecialCourseExtnService $specialCourseExtnService)
    {
        $this->specialCourseExtnService = $specialCourseExtnService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfSpecialCourseExtn = SpecialCourseExtension::getAllSpecialExn();
        $listOfSpecialCourse =  SpecialCourse::getAllSpecial();

        return $dataTable->render('Special.Extn.index', compact(
            'listOfSpecialCourseExtn',
            'listOfSpecialCourse'
        ));
    }
    
    public function store(StoreOrUpdateSpecialCourseExtnRequest $request)
    {
        $this->specialCourseExtnService->specialCourseExtnStore($request->validated());

        return redirect()->route('superadmin.specialExtn.index')->with(
            'success',
            'Special course extension added successfully!'
        );
    }
    
    public function edit(SpecialCourseExtension $specialExtn)
    {
        $listOfSpecialCourse =  SpecialCourse::getAllSpecial();

        return view('Special.Extn.edit', compact(
            'specialExtn',
            'listOfSpecialCourse'
        ));
    }

    public function update(StoreOrUpdateSpecialCourseExtnRequest $request, SpecialCourseExtension $specialExtn)
    {
        $this->specialCourseExtnService->specialCourseExtnUpdate($specialExtn, $request->validated());

        return redirect()->route('superadmin.specialExtn.edit', $specialExtn)->with(
            'success',
            'Special course extension added successfully!'
        );
    }
    
    public function destroy(SpecialCourseExtension $specialExtn)
    {
        $this->specialCourseExtnService->specialCourseExtnDestroy($specialExtn);

        return redirect()->route('superadmin.specialExtn.index')->with(
            'success',
            'Special course extension added successfully!'
        );
    }
}
