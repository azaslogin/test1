<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
    protected $table = 'genre_movie';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = ['genre_id', 'movie_id'];
}
