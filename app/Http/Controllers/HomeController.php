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
    Models\CourseExtension,
    Models\SpecialTraning,
    Models\SpecialCourse,
    Models\SpecialCourseExtension,
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
        $listOfSpecialCourse = SpecialCourse::getAllSpecial();
        $listOfSpecialExn = SpecialCourseExtension::getAllSpecialExn();
        $userInformation = Information::getInformation($user->id);
        $userCourse = Course::getCourse($user->id);
        $listOfCourse = Course::getAllCourse($user->id);
        $userCourseExn = CourseExtension::getCourseExn($user->id);
        
        return view('home', compact(
            'listOfRank', 
            'listOfOffice', 
            'userInformation', 
            'listOfProgram',
            'userCourse',
            'listOfCourse',
            'userCourseExn',
            'listOfSpecialCourse',
            'listOfSpecialExn',
            'user'
        ));
    }
}