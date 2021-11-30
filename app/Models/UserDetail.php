<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'sex',
        'avatar',
        'religion',
        'nationality',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'phone_number',
        'street',
        'brgy',
        'city',
        'province',
        'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
