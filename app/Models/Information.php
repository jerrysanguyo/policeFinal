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
        'entered_service',
        'last_promotion',
    ];

    public static function getInformation($user_id)
    {
        return self::where('user_id', $user_id)->first();
    }
}
