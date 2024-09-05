<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialCourseExtension extends Model
{
    use HasFactory;

    protected $table = 'special_course_extensions';
    protected $fillable = [
        'special_id',
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];

    public static function getAllSpecialExn()
    {
        return self::all();
    }

    public function special()
    {
        return $this->belongsto(SpecialCourse::class, 'special_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
