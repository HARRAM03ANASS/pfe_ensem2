<?php

namespace App\Models;

use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Watchlisht extends Model
{
    use HasFactory;
    protected $fillable=['user_id','movie_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function movie(){
        return $this->hasMany(Movie::class);
    }
}