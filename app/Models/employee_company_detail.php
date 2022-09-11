<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_company_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'employee_id',
        'department_id',
        'designation_id',
        'assigned_manager_id',
        'doj',
        'dol',
        'status'
    ];
}
