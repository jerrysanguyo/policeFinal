<?php

namespace App\Services;

use App\Models\Bmi;
use Illuminate\Support\Facades\Auth;

class BmiService
{
    public function store(array $data): Bmi
    {
        return Bmi::create([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'created_by'    =>  Auth::id(),
            'updated_by'    =>  Auth::id(),
        ]);
    }

    public function update(array $data, $bmi): Bmi
    {
        $bmi->update([
            'name'          =>  $data['name'],
            'remarks'       =>  $data['remarks'],
            'updated_by'    =>  Auth::id(),
        ]);

        return $bmi;
    }

    public function destroy($bmi): Bmi
    {
        $bmi->delete();

        return $bmi;
    }
}