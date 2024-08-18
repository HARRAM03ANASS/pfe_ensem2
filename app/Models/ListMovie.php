<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListMovie extends Model
{
    use HasFactory;

    protected $table = 'list_movie';

    protected $fillable = [
        'lista_id',
        'movie_id',
        'user_id',
    ];


}
