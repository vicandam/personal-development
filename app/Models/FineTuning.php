<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FineTuning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_id',
        'object',
        'bytes',
        'created_at',
        'filename',
        'purpose',
        'status',
        'status_details'
    ];
}
