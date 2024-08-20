<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Rank,
    Office,
};

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listOfRank = Rank::getAllRank();
        $listOfOffice = Office::getAllOffice();
        return view('home', compact(
            'listOfRank',
            'listOfOffice',
        ));
    }
}
