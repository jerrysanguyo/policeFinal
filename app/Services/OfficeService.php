<?php

namespace App\Services;

use App\Models\Office;
use Illuminate\Support\Facades\Auth;

class OfficeService
{
    public function officeStore(array $data): Office
    {
        return Office::create([
            'name'          =>  $data['name'],
            'remarks'       =>   $data['remarks'],
            'created_by'    =>  Auth::id(),
            'updated_by'    =>  Auth::id(),
        ]);
    }

    public function officeUpdate(Office $office, array $data): Office
    {
        $office->update([
            'name'          =>  $data['name'],
            'remarks'       =>   $data['remarks'],
            'updated_by'    =>  Auth::id(),
        ]);
        
        return $office;
    }
}