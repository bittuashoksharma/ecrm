<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone_number'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employeePersonalInfo()
    {
        return $this->hasOne(EmployeePersonalDetail::class,'user_id','id');
    }
    public function employeeCompanyInfo()
    {
        return $this->hasOne(EmployeeCompanyDetail::class,'user_id','id');
    }
    public function employeeAditionalInfo()
    {
        return $this->hasOne(EmployeeAdditionalDetail::class,'user_id','id');
    }

    public function employeeFinancialInfo()
    {
        return $this->hasOne(EmployeeFinancialDetail::class,'user_id','id');
    }
    public function employeeBankInfo()
    {
        return $this->hasOne(EmployeeBankDetail::class,'user_id','id');
    }
    

}
