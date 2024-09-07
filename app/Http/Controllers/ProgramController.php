<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;
use App\DataTables\UniversalDataTable;
use App\Services\ProgramService;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    protected $programService;

    public function __construct(ProgramService $programService)
    {
        $this->programService = $programService;
    }
    
    public function index(UniversalDataTable $dataTable)
    {
        $listOfProgram = Program::getAllProgram();

        return $dataTable->render('Program.index', compact(
            'listOfProgram'
        ));
    }
    
    public function store(StoreProgramRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->programService->programStore($request->validated());
        
        return redirect()->route($userRole. '.program.index')->with(
            'success',
            'Program added successfully!'
        );
    }
    
    public function edit(Program $program)
    {
        return view('program.edit', compact(
            'program',
        ));
    }
    
    public function update(UpdateProgramRequest $request, Program $program)
    {
        $userRole = Auth::user()->role;
        $this->programService->programUpdate($program, $request->validated());

        return redirect()->route($userRole . '.program.edit', $program)->with(
            'success',
            'Program updated successfully!'
        );
    }
    
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->route('superadmin.program.index')->with(
            'success',
            'Program deleted successfully!'
        );
    }
}
