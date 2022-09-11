<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_financial_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'basic_salary',
        'allowances',
        'deductions',
        'monthly_salary',
        'yearly_salary'
    ];
}
