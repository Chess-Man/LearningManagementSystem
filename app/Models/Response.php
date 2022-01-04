<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $table = 'responses';
    public function tests()
    {
        return $this->belongsTo(Test::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
