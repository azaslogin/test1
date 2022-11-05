<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryMovie extends Model
{
    public $timestamps = FALSE;
    use HasFactory;
    protected $fillable = ['genre_id', 'movie_id'];
}