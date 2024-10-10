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
    Models\SpecialTraining,
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
        // Auth to get user Id
        $user = Auth::user();
        // options in select
        $listOfRank = Rank::getAllRank();
        $listOfOffice = Office::getAllOffice();
        $listOfProgram = Program::getAllProgram();
        $listOfSpecialCourse = SpecialCourse::getAllSpecial();
        $listOfSpecialExn = SpecialCourseExtension::getAllSpecialExn();
        // data fetched per user
        // ---------------------
        // information
        $userInformation = Information::getInformation($user->id);
        // course
        $userCourse = Course::getCourse($user->id);
        $listOfCourse = Course::getAllCourse($user->id);
        $userCourseExn = CourseExtension::getCourseExn($user->id);
        // training
        $userTraining = SpecialTraining::getTraining($user->id);
        $getAllTraining = SpecialTraining::getAllTraining($user->id);
        
        return view('home', compact(
            'user',
            'listOfRank', 
            'listOfOffice',
            'listOfProgram', 
            'listOfSpecialCourse',
            'listOfSpecialExn',
            'userInformation', 
            'userCourse',
            'listOfCourse',
            'userCourseExn',
            'userTraining',
            'getAllTraining'
        ));
    }
}