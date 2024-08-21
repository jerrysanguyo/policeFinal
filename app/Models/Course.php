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
        'duration',
        'ranking',
    ];

    public static function getCourse($userId)
    {  
        return self::where('user_id', $userId)->first();
    }
}
