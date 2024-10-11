<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class physical_picture extends Model
{
    use HasFactory;

    protected $table = 'physical_pictures';
    protected $fillable = [
        'user_id',
        'picture_name',
        'picture_path',
        'remarks',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
