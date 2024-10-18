<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = [
        'user_id',
        'program_id',
        'class_number',
        'start_date',
        'end_date',
        'duration',
        'ranking',
    ];

    public static function getCourse($userId)
    {  
        return self::where('user_id', $userId)->first();
    }

    public static function getUserPerProgram()
    {
        return \DB::table('programs')
            ->leftJoin('courses', 'programs.id', '=', 'courses.program_id')
            ->select('programs.id as program_id', 'programs.name', 
                \DB::raw('count(distinct courses.user_id) as total_users'))
            ->groupBy('programs.id', 'programs.name')
            ->get();
    }

    public static function getAllCourse($userId)
    {
        return self::where('user_id', $userId)->get();
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
