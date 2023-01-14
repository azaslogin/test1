<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryMovie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['genre_id', 'movie_id'];
}
