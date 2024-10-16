<?php

namespace App\Http\Controllers;

use App\{
    Models\Physical,
    Models\Physical_picture,
    Models\Physical_pft,
    Services\PhysicalService,
    Http\Requests\UpdatePhysicalPictureRequest,
    Http\Requests\UpdatePhysicalRequest,
    Http\Requests\StorePhysicalRequest,
};

use Illuminate\Support\Facades\Auth;

class PhysicalController extends Controller
{
    protected $physicalService;
    
    public function __construct(PhysicalService $physicalService)
    {
        $this->physicalService = $physicalService;
    }

    public function store(StorePhysicalRequest $request)
    {
        $userRole = Auth::user()->role;
        $this->physicalService->store($request->validated());

        return redirect()->route($userRole . '.dashboard')->with(
            'success', 'Physical fitness training saved successfully!'
        );
    }

    public function updatePicture(UpdatePhysicalPictureRequest $request, Physical_picture $physicalPic)
    {
        $userRole = Auth::user()->role;
        $newPicture = $request->file('picture');
        $this->physicalService->updatePhysicalPic($physicalPic, $newPicture);

        return redirect()->route($userRole . '.dashboard')->with([
            'success' => 'Athletic picture saved successfully!',
            'activeTab' =>  'physical'
        ]);
    }
    
    public function update(UpdatePhysicalRequest $request, Physical $physical)
    {
        $userRole = Auth::user()->role;
        $this->physicalService->update($physical, $request->validated());

        return redirect()->route($userRole . '.dashboard')->with([
            'success' => 'Athletic picture saved successfully!',
            'activeTab' =>  'physical'
        ]);
    }
    
    public function destroy(Physical $physical)
    {
        //
    }
}