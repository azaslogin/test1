<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','year','duration'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}
