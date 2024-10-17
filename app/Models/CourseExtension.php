<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseExtension extends Model
{
    use HasFactory;

    protected $table = 'course_extensions';
    protected $fillable = [
        'user_id',
        'date_graduation',
        'high_training',
        'order_merit',
        'ftoc',
        'qe_result',
        'date_qualifying'
    ];

    public static function getCourseExn($userId)
    {
        return self::where('user_id', $userId)->first();
    }

    public function highestTraining()
    {
        return $this->belongsTo(Program::class, 'high_training');
    }
}
