<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = [
        'user_id',
        'rank_id',
        'qlfr',
        'badge_number',
        'gender',
        'birthdate',
        'age',
        'office_id',
        'shift',
        'entered_service',
        'last_promotion',
    ];

    public static function getInformation($user)
    {
        return self::where('user_id', $user)->first();
    }
}
