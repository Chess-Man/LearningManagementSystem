<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';

    protected $fillable = [
        'question',
        'type',
        'test_id',
        
    ];

    protected $casts = [
        "choices" => 'array'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function  options()
    {
        return $this->hasMany(Option::class);
    }
}
