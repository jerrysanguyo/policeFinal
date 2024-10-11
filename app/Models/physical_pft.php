<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physical_pft extends Model
{
    use HasFactory;

    protected $table = 'physical_pfts';
    protected $fillable = [
        'user_id',
        'physical_id',
        'month',
        'year',
        'date_pft',
        'remarks',
        'score',
        'type',
        'pft_result'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function physical()
    {
        return $this->belongsTo(Physical::class, 'physical_id');
    }
}
