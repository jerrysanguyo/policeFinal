<?php

namespace App\Services;

use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProgramService
{
    public function programStore(array $data): Program
    {
        return Program::create([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'created_by'    =>  Auth::id(),
            'updated_by'    =>  Auth::id(),
        ]);
    }

    public function programUpdate(Program $program, array $data): Program
    {
        $program->update([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'updated_by'    =>  Auth::id(),
        ]);

        return $program;
    }
}