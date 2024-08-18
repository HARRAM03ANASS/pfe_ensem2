<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lista;
use App\Models\Review;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

public function watchlist()
{
    return $this->belongsToMany(Movie::class, 'watchlishts')->withTimestamps();
}
public function watched()
{
    return $this->belongsToMany(Movie::class, 'watcheds')->withTimestamps();
}

public function listas()
{
        return $this->hasMany(Lista::class);
}

     /**
     * Get the users that the current user is following.
     */
public function following()
{
    return $this->belongsToMany(User::class,'followers','follower_id','user_id')->withTimestamps();
}

// get the followers of the current user 
public function followers(){
    return $this->belongsToMany(User::class,'followers', 'user_id', 'follower_id')->withTimestamps();
}

public function likedReviews()
{
    return $this->belongsToMany(Review::class, 'likes')->withTimestamps();
}

}
   
