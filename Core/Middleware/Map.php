<?php

namespace Core\Middleware;

class Map 
{
    public const filter = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];
}