<?php

namespace App\Http\Controllers;

use App\{
    Models\Bmi,
    Services\BmiServices,
    DataTables\UniversalDataTable,
    Http\Requests\StoreBmiRequest,
    Http\Requests\UpdateBmiRequest,
};

use Illuminate\Support\Facades\Auth;

class BmiController extends Controller
{
    protected $bmiServices;
    
    public function __contruct(BmiServices $bmiServices)
    {
        $this->bmiServices = $bmiServices;
    }

    public function index(UnviersalDataTable $dataTable)
    {
        $listOfBmi = Bmi::getAllBmi();

        return $dataTable->render('Bmi.index')->compact(
            'listOfBmi'
        );
    }
    
    public function store(StoreBmiRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->bmiServices->store($request->validated());

        return redirect()->route($userRole . '.bmi.store')->with(
            'success', 
            'Bmi added successfully!'
        );
    }

    public function edit(Bmi $bmi)
    {
        $listOfBmi = Bmi::getAllBmi();

        return view('Bmi.edit')->compact(
            'bmi',
            'listOfBmi',
        );
    }
    
    public function update(UpdateBmiRequest $request, Bmi $bmi)
    {
        $userRole = Auth::user()->role;
        $this->bmiServices->update($request->validate(), $bmi);

        return redirect()->route($userRole . '.bmi.edit', $bmi)->with(
            'success',
            'Bmi updated successfully!'
        );
    }
    
    public function destroy(Bmi $bmi)
    {
        $userRole = Auth::user()->role;
        $this->bmiServices->destroy($bmi);

        return redirect()->route($userRole . '.bmi.index')->with(
            'success',
            'Bmi deleted successfully!'
        );
    }
}
