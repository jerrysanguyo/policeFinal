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

    public function course()
    {
        return $this->belongsTo(SpecialCourse::class, 'admin_course');
    }

    public function training()
    {
        return $this->belongsTo(SpecialCourseExtension::class, 'admin_training');
    }
}
