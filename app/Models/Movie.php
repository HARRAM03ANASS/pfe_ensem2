<?php

namespace App\Models;

use App\Models\User;
use App\Models\Lista;
use App\Models\Rating;
use App\Models\Review;
use App\Models\ListMovie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable=[
        'api_id',
        'title',
        'description',
        'release_date',
        'poster_path',
        'backdrop_path',
        'runtime',
        'tagline',
        'director',
        'genre',
        'cast',
    ];

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function usersWhoWatchlisted(){
        return $this->belongsToMany(User::class,'watchlishts')->withTimestamps();
    }
    public function usersWhoWatcheds(){
        return $this->belongsToMany(User::class,'watcheds')->withTimestamps();
    }
    public function movieInList()
    {
        return $this->belongsToMany(ListMovie::class, 'list_movie')->withTimestamps();
    }
}
    
