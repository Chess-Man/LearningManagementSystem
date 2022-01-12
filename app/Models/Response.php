<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $table = 'responses';
    protected $fillable = [
        'answer',
        'user_id',
        'question_id',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
