<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 17.06.2016
 * Time: 00:12
 */

namespace App\Entity;
use Redis;

class RedisEntity
{
    public static $redisSplitSymbol = ':';
    private $redisPrefix;


    /**
     * RedisEntity constructor.
     * @param $redisPrefix
     */
    public function __construct($redisPrefix)
    {
        $this->redisPrefix = implode(RedisEntity::$redisSplitSymbol,$redisPrefix);
    }

    protected function get($attribute) {
        return Redis::get($this->redisPrefix.RedisEntity::$redisSplitSymbol.$attribute);
    }

    protected function set($attribute,$value) {
        Redis::set($this->redisPrefix.RedisEntity::$redisSplitSymbol.$attribute, $value);
    }
}