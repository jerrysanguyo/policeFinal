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
        'admin_training',
        'class_number',
        'duration',
        'height',
    ];

    public static function getSpecialTraining($userId)
    {  
        return self::where('user_id', $userId)->first();
    }
    
    public static function getAllSpecialTraining($userId)
    {
        return self::where('user_id', $userId)->get();
    }
}
