<?php

namespace App\Services;

use App\{
    Models\User,
    Models\Program,
    Models\SpecialCourse,
    Exports\UsersExportProgram,
    Exports\UsersExportCourse,
};
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class UserExportService
{
    protected $dateTime;

    public function __construct()
    {
        $this->dateTime = Carbon::now()->format('Y_m_d_His');
    }

    public function nameFormat($model): string
    {
        return str_replace(' ', '_', $model->name); 
    }

    public function exportUserProgram(int $programId)
    {
        $program = Program::findOrFail($programId);
        $programName = $this->nameFormat($program);

        return Excel::download(new UsersExportProgram($programId), "{$programName}_users_{$this->dateTime}.xlsx");
    }

    public function exportUserCourse(int $courseId)
    {
        $course = SpecialCourse::findOrFail($courseId);
        $courseName = $this->nameFormat($course);

        return Excel::download(new UsersExportCourse($courseId), "{$courseName}_users_{$this->dateTime}.xlsx");
    }
}