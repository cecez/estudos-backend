<?php

namespace App\Services;


use Illuminate\Support\Facades\Cache;

class RussianCaching
{
    protected static array $keys = [];

    public static function setUp($model)
    {
        ob_start();

        static::$keys[] = $key = $model->getCacheKey();
        return Cache::has($key);
    }

    public static function tearDown()
    {
        $key = array_pop(static::$keys);

        $html = ob_get_clean();

        return Cache::rememberForever($key, function () use ($html) {
            return $html;
        });
    }
}
