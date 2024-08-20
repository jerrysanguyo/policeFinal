<?php

namespace App\Http\Controllers;

use App\{
    Models\Office,
    Http\Requests\StoreOfficeRequest,
    Http\Requests\UpdateOfficeRequest,
    Services\OfficeService,
    DataTables\UniversalDataTable,
};

class OfficeController extends Controller
{
    protected $officeService;

    public function __construct(OfficeService $officeService)
    {
        $this->officeService = $officeService;
    }

    public function index(UniversalDataTable $dataTable)
    {
        $listOfOffice = Office::getAllOffice();

        return $dataTable->render('Office.index', compact(
            'listOfOffice',
        ));
    }
    
    public function store(StoreOfficeRequest $request)
    {
        $this->officeService->officeStore($request->validated());

        return redirect()->route('superadmin.office.index')->with(
            'success',
            'Office added successfully!'
        );
    }
    
    public function edit(Office $office)
    {
        return view('office.edit', compact(
            'office'
        ));
    }
    
    public function update(UpdateOfficeRequest $request, Office $office)
    {
        $this->officeService->officeUpdate($office, $request->validated());

        return redirect()->route('superadmin.office.edit', $office)->with(
            'success',
            'Office updated successfully!'
        );
    }
    
    public function destroy(Office $office)
    {
        $office->delete();

        return redirect()->route('superadmin.office.index')->with(
            'success',
            'Office deleted successfully!'
        );
    }
}
