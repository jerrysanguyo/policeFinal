<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physical extends Model
{
    use HasFactory;

    protected $table = 'physicals';
    protected $fillable = [
        'user_id',
        'bmi_result',
        'bmi_category',
        'waist',
        'hip',
        'wrist',
        'height',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bmi()
    {
        return $this->belongsTo(Bmi::class, 'bmi_category');
    }
    
    public static function userPhysical($userId)
    {
        return self::where('user_id', $userId)->first();
    }
}
