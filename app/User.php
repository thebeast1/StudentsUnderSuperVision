<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id','address','gender','DateOfBirth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isAdmin()
    {
        if($this->role ==0)
        {
            return true;
        }
        return false;
    }

    
    public function isEmployee()
    {
        if($this->role ==1)
        {
            return true;
        }
        return false;
    }
    
    public function isSecurityView()
    {
        if($this->role ==2)
        {
            return true;
        }
        return false;
    }
    
    public function isSecurityUpdator()
    {
        if($this->role ==3)
        {
            return true;
        }
        return false;
    }
    
    public function isCulturealOffice()
    {
        if($this->role ==4)
        {
            return true;
        }
        return false;
    }
    
    public function isStudent()
    {
        if($this->role ==5)
        {
            return true;
        }
        return false;
    }

}
