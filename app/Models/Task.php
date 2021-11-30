<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'classes_id',
        'name',
        'instruction',
        'file_path',
    ];

    public function classes()
    {
        return $this->belongsTo(Classes::class);
    }

    public function studentfile()
    {
        return $this->hasMany(StudentFile::class);
    }
}
