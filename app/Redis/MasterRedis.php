<?php

namespace App\Redis;

use Illuminate\Support\Facades\Cache;

class MasterRedis
{
    /**
     * @return bool
     */
    public function forget(string $key): bool
    {
        return Cache::forget($key);
    }
}
