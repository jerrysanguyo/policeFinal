<?php

namespace App\Http\Controllers;

use App\{
    Models\User,
    Http\Requests\ExportUserRequest,
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
    
    public function exportUsers(ExportUserRequest $request)
    {
        $programId = $request->validated('program_id');
        return $this->userExportService->exportUserProgram($programId);
    }
}
