<?php

namespace App\Http\Controllers;

use Illuminate\{
    Http\Request,
    Support\Facades\Auth,
};
use App\{
    Models\User,
    Models\Rank,
    Models\Office,
    Models\Information,
    Models\Program,
    Models\Course,
};

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $listOfRank = Rank::getAllRank();
        $listOfOffice = Office::getAllOffice();
        $listOfProgram = Program::getAllProgram();
        $userInformation = Information::getInformation($user->id);
        $userCourse = Course::getCourse($user->id);
        
        return view('home', compact(
            'listOfRank', 
            'listOfOffice', 
            'userInformation', 
            'listOfProgram',
            'userCourse',
            'user'
        ));
    }
}