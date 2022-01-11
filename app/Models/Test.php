<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_name',
        'instruction',
        'duration',
        'number_of_questions',
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class );
    }

    public function testresults()
    {
        return $this->hasMany(TestResult::class );
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
