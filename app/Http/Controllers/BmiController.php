<?php

namespace App\Http\Controllers;

use App\{
    Models\Bmi,
    Services\BmiService,
    DataTables\UniversalDataTable,
    Http\Requests\StoreBmiRequest,
    Http\Requests\UpdateBmiRequest,
};

use Illuminate\Support\Facades\Auth;

class BmiController extends Controller
{
    protected $bmiService;
    
    public function __construct(BmiService $bmiService)
    {
        $this->bmiService = $bmiService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfBmi = Bmi::getAllBmi();

        return $dataTable->render('Bmi.index', compact(
            'listOfBmi'
        ));
    }
    
    public function store(StoreBmiRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->bmiService->store($request->validated());

        return redirect()->route($userRole . '.bmi.store')->with(
            'success', 
            'Bmi added successfully!'
        );
    }

    public function edit(Bmi $bmi)
    {
        $listOfBmi = Bmi::getAllBmi();

        return view('Bmi.edit', compact(
            'bmi',
            'listOfBmi',
        ));
    }
    
    public function update(UpdateBmiRequest $request, Bmi $bmi)
    {
        $userRole = Auth::user()->role;
        $this->bmiService->update($request->validated(), $bmi);

        return redirect()->route($userRole . '.bmi.edit', $bmi)->with(
            'success',
            'Bmi updated successfully!'
        );
    }
    
    public function destroy(Bmi $bmi)
    {
        $userRole = Auth::user()->role;
        $this->bmiService->destroy($bmi);

        return redirect()->route($userRole . '.bmi.index')->with(
            'success',
            'Bmi deleted successfully!'
        );
    }
}