<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    protected $fillable=['user_id','movie_id','content'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function movie(){
        return $this->belongsTo(Movie::class);
    }
    public function likedByUsers()
{
    return $this->belongsToMany(User::class, 'likes')->withTimestamps();
}
}
