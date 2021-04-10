<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class reservation extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = 'reservations';
    protected $fillable = [
        'movie_id',
        'lounge_id',
        'user_id',
        'time_id',
        'number'

    ];
    public function movie (){
        return $this->belongsTo('App\Models\Move', 'movie_id', 'id');
    }

    public function lounge (){
        return $this->belongsTo('App\Models\Lounge', 'lounge_id', 'id');
    }

    public function user (){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function time (){
        return $this->belongsTo('App\Models\ItemMovies', 'time_id', 'id');
    }
}
