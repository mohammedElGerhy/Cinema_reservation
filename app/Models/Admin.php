<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    use HasFactory ,Notifiable;
    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function setPasswordAttribute ($password){
        if (!empty($password)){
            $this->attributes['password'] = bcrypt($password);
        }
    }
    public function getPhotoAttribute($val)
    {
        return ($val !== null) ? asset('/assets/' . $val) : "";

    }
}
