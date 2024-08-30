<?php

namespace App\Http\Controllers;

use App\Models\{
    Course,
    CourseExtension,
};
use App\Http\Requests\{
    StoreOrUpdateCourseRequest,
    UpdateCourseRequests,

};
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

    public function update(UpdateCourseRequests $request, Course $course)
    {
        $userRole = Auth::user()->role;
        $data = $request->validated();

        $this->courseService->courseUpdate($course, $data);

        return redirect()->route($userRole . '.dashboard')->with(
            'success',
            'Course updated successfully!'
        );
    }

    public function courseExnUpdate(StoreOrUpdateCourseRequest $request, CourseExtension $courseExn)
    {
        $userRole = Auth::user()->role;
        $data = $request->validated();

        $this->courseService->courseExnUpdate($courseExn, $data);

        return redirect()->route($userRole . '.dashboard')->with(
            'success',
            'Course updated successfully!'
        );
    }

    public function destroy(Course $course)
    {
        $userRole = Auth::user()->role;
        $course->delete();

        return redirect()->route($userRole . '.dashboard')->with(
            'success',
            'Course deleted successfully!'
        );
    }
}