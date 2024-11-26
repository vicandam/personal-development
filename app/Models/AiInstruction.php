<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiInstruction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coach_name',
        'topic',
        'instruction'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('D, M d, g.i A');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
