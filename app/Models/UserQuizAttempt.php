<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuizAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'score',
        'total_questions'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}