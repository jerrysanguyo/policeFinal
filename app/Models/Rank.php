<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;
    
    protected $table = 'ranks';

    protected $fillable = [
        'name',
        'remarks',
        'created_by',
        'updated_by',
    ];
}
