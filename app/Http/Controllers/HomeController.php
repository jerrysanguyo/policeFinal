<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Rank;
use App\Models\Office;
use App\Models\Information;
use App\Services\InformationService;

class HomeController extends Controller
{
    protected $informationService;

    public function __construct(InformationService $informationService)
    {
        $this->middleware('auth');
        $this->informationService = $informationService;
    }

    public function index()
    {
        $user = Auth::user();
        $listOfRank = Rank::getAllRank();
        $listOfOffice = Office::getAllOffice();
        $userInformation = Information::getInformation($user->id);
        
        return view('home', compact(
            'listOfRank', 
            'listOfOffice', 
            'userInformation', 
            'user'
        ));
    }
}