<?php

namespace App\Redis;

use App\Models\Country;
use App\Models\Movie;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class MovieRedis extends MasterRedis
{
    public const MOVIES_BY_TITLE = 'movies_by_title';

    /**
     * @return Collection
     */
    public function getMoviesByTitle(): Collection
    {
        return Cache::remember(self::MOVIES_BY_TITLE, env('TIME_IN_CACHE', 60), function () {
            echo 'saving in cache movie';
            return Movie::all()->sortBy('title');
        });
    }
}
