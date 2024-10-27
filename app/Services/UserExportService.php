<?php

namespace App\Services;

use App\{
    Models\User,
    Models\Program,
    Exports\UsersExportProgram,
};
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class UserExportService
{
    public function exportUserProgram(int $programId)
    {
        $program = Program::findOrFail($programId);
        $programName = str_replace(' ', '_', $program->name); 
        $dateTime = Carbon::now()->format('Y_m_d_His'); 

        return Excel::download(new UsersExportProgram($programId), "{$programName}_users_{$dateTime}.xlsx");
    }
}