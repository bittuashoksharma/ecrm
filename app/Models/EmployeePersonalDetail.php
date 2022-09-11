<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePersonalDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'father_name',
        'dob',
        'gender',
        'phone_number_2',
        'current_address',
        'permanent_address',
        'nationality',
        'maritial_status',
        'photo'
    ];
}