<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'code',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function classstudent()
    {
        return $this->hasOne(ClassStudent::class);
    }

   
    // public function StudentSubject()
    // {
    //     return $this->belongsTo(StudentSubject::class);
    // }
}
