<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Move extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table ='moves';

    protected $fillable = [

        'name',
        'image',
        'date_show',
        'statues',
    ];
    public function getImageAttribute($val)
    {
        return ($val !== null) ? asset('/assets/' . $val) : "";

    }
    public function times (){
        return $this->hasMany('App\Models\ItemMovies','id_movies', 'id');
    }

    public function reservation (){
        return $this->hasMany('App\Models\reservation','movie_id', 'id');
    }
}
