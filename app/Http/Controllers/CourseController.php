<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreOrUpdateCourseRequest;
use App\Services\CourseService;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function store(StoreOrUpdateCourseRequest $request)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $data = $request->validated();

        $this->courseService->courseStore($data, $userId);

        return redirect()->route($userRole . '.dashboard')->with(
            'success',
            'Courses saved successfully!'
        );
    }

    public function update(StoreOrUpdateCourseRequest $request, Course $course)
    {
        $userId = Auth::id();
        $userRole = Auth::user()->role;
        $data = $requests->validated();

        $this->courseService->courseUpdate($data, $userId);

        return redirect()->route($userRole . '.dashboard')->with(
            'success',
            'Course updated successfully!'
        );
    }
}