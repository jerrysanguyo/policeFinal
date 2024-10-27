<?php

namespace App\Http\Controllers;

use App\{
    Models\User,
    Http\Requests\ExportUserRequest,
    Http\Requests\ExportUserCourseRequest,
    Services\UserExportService,
};
use Illuminate\Http\Request;

class ExportController extends Controller
{
    protected $userExportService;

    public function __construct(UserExportService $userExportService)
    {
        $this->userExportService = $userExportService;
    }
    
    public function exportUsersProgram(ExportUserRequest $request)
    {
        $programId = $request->validated('program_id');
        return $this->userExportService->exportUserProgram($programId);
    }

    public function exportUsersCourse(ExportUserCourseRequest $request)
    {
        $courseId = $request->validated('admin_course');
        return $this->userExportService->exportUserCourse($courseId);
    }
}
