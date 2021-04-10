<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class ItemMovies extends Authenticatable
{
    use HasFactory,Notifiable;
    protected $table = 'item_movies';
    protected $fillable = [
        'from',
        'to',
        'ticket',
        'status',
        'id_lounge',
        'id_movies',
    ];
    public function lounge (){
        return $this->belongsTo('App\Models\Lounge', 'id_lounge','id');
    }
    public function movies (){
        return $this->belongsTo('App\Models\Move', 'id_movies','id');
    }
    public function reservation(){
        return $this->hasMany('App\Models\reservation','time_id', 'id');
    }
}
