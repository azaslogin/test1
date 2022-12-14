<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = FALSE;
    use HasFactory;

    protected $fillable = ['title', 'description'];



    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
