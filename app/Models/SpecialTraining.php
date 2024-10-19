<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialTraining extends Model
{
    use HasFactory;

    protected $table = 'special_trainings';
    protected $fillable = [
        'user_id',
        'admin_course',
        'admin_training',
        'class_number',
        'start_date',
        'end_date'
    ];

    public static function getTraining($userId)
    {  
        return self::where('user_id', $userId)->first();
    }
    
    public static function getAllTraining($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    public static function perCourse($course, $userId)
    {
        return self::where('admin_course', $course)
                    ->where('user_id', $userId)
                    ->get();
    }

    public static function getUserPerCourse()
    {
        return \DB::table('special_courses')
            ->leftJoin('special_trainings', 'special_courses.id', '=' ,'special_trainings.admin_course')
            ->select('special_courses.id as course_id', 'special_courses.name', 
                \DB::raw('count(special_trainings.user_id) as total_users'))
            ->groupBy('special_courses.id', 'special_courses.name')
            ->get();
    }

    public static function getUserInvestigation()
    {
        return \DB::table('special_course_extensions')
            ->leftJoin('special_trainings', 'special_course_extensions.id', '=', 'special_trainings.admin_training')
            ->select('special_course_extensions.id as training_id', 'special_course_extensions.name',
                \DB::raw('count(special_trainings.user_id) as total_users')) 
            ->where('special_trainings.admin_course', 1)
            ->groupBy('special_course_extensions.id', 'special_course_extensions.name')
            ->get();
    }

    public static function getUserIntelligence()
    {
        return \DB::table('special_course_extensions')
            ->leftJoin('special_trainings', 'special_course_extensions.id', '=', 'special_trainings.admin_training')
            ->select('special_course_extensions.id as training_id', 'special_course_extensions.name',
                \DB::raw('count(special_trainings.user_id) as total_users')) 
            ->where('special_trainings.admin_course', 2)
            ->groupBy('special_course_extensions.id', 'special_course_extensions.name')
            ->get();
    }

    public static function getUserOperation()
    {
        return \DB::table('special_course_extensions')
            ->leftJoin('special_trainings', 'special_course_extensions.id', '=', 'special_trainings.admin_training')
            ->select('special_course_extensions.id as training_id', 'special_course_extensions.name',
                \DB::raw('count(special_trainings.user_id) as total_users')) 
            ->where('special_trainings.admin_course', 3)
            ->groupBy('special_course_extensions.id', 'special_course_extensions.name')
            ->get();
    }

    public static function getUserAdministrative()
    {
        return \DB::table('special_course_extensions')
            ->leftJoin('special_trainings', 'special_course_extensions.id', '=', 'special_trainings.admin_training')
            ->select('special_course_extensions.id as training_id', 'special_course_extensions.name',
                \DB::raw('count(special_trainings.user_id) as total_users')) 
            ->where('special_trainings.admin_course', 4)
            ->groupBy('special_course_extensions.id', 'special_course_extensions.name')
            ->get();
    }

    public static function getUserPcr()
    {
        return \DB::table('special_course_extensions')
            ->leftJoin('special_trainings', 'special_course_extensions.id', '=', 'special_trainings.admin_training')
            ->select('special_course_extensions.id as training_id', 'special_course_extensions.name',
                \DB::raw('count(special_trainings.user_id) as total_users')) 
            ->where('special_trainings.admin_course', 6)
            ->groupBy('special_course_extensions.id', 'special_course_extensions.name')
            ->get();
    }

    public function course()
    {
        return $this->belongsTo(SpecialCourse::class, 'admin_course');
    }

    public function training()
    {
        return $this->belongsTo(SpecialCourseExtension::class, 'admin_training');
    }
}
