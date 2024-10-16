<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physical_pft extends Model
{
    use HasFactory;

    protected $table = 'physical_pfts';
    protected $fillable = [
        'user_id',
        'month',
        'year',
        'date_pft',
        'remarks',
        'score',
        'type',
        'pft_result_name',
        'pft_result_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function userPft($userId)
    {
        return self::where('user_id', $userId);
    }
}
