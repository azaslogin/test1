<?php

namespace App\Redis;

use App\Models\Country;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CountryRedis extends MasterRedis
{
    public const COUNTRIES_BY_TITLE = 'countries_by_title';

    /**
     * @return Collection
     */
    public function getCountriesByTitle(): Collection
    {
        return Cache::remember(self::COUNTRIES_BY_TITLE, env('TIME_IN_CACHE', 60), function() {
            echo 'saving in cache country';
            return Country::all()->sortBy('title');
        });
    }
}
