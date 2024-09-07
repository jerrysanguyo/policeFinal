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
        $userRole = Auth::user()->role;
        $data = $request->validated();

        $information = $this->informationService->storeOrUpdateInformation($data, $userId);

        return redirect()->route($userRole . '.dashboard')->with([
            'success'   => 'Information saved successfully!',
            'activeTab' => 'information',
        ]);
    }
}
