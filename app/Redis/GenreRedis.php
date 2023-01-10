<?php

namespace App\Redis;

use App\Models\Genre;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class GenreRedis extends MasterRedis
{
    public const GENRES_BY_TITLE = 'genres_by_title';

    /**
     * @return Collection
     */
    public function getGenresByTitle(): Collection
    {
        return Cache::remember(self::GENRES_BY_TITLE, env('TIME_IN_CACHE', 60), function() {
            return Genre::all()->sortBy('title');
        });
    }
}
