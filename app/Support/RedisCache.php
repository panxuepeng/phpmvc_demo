<?php
namespace app\Support;

class RedisCache
{
    public function get($key)
    {
        return 'RedisCache->get()';
    }

    public function set($key, $value)
    {
        return 'RedisCache->set()';
    }
}
