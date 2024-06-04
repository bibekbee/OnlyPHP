<?php

namespace Core\Middleware;

class Map 
{
    public const filter = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve($key) {
        if(!$key){
            return;
        }

        $middleware = static::filter[$key] ?? false;

        if(!$middleware){
            throw new \Exception("No Middleware registered for this key: $key");
        }

        (new $middleware)->handle();
    }
}