<?php

namespace App\Http\Controllers;

use App\{
    Models\Information,
    Http\Requests\StoreOrUpdateInformationRequest,
    Services\InformationService,
};
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    protected $informationService;

    public function __construct(InformationService $informationService)
    {
        $this->informationService = $informationService;
    }

    public function storeOrUpdate(StoreOrUpdateInformationRequest $request)
    {
        $userId = Auth::id();
        $data = $request->validated();
        $this->informationService->storeOrUpdateInformation($data, $userId);

        return redirect()->route('superadmin.dashboard')->with(
            'success', 
            'Information saved successfully!'
        );
    }
}
