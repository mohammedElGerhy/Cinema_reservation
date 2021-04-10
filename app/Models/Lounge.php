<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Lounge extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'lounges';
    protected $fillable = [
      'name',
      'Number_chairs'
    ];
    public function time(){
        return $this->hasMany('App\Models\ItemMovies','id_lounge', 'id');
    }

    public function reservation(){
        return $this->hasMany('App\Models\reservation','lounge_id', 'id');
    }
}
