<?php

namespace Core;

class App{
    protected static $container;

    public static function SetContainer($content){
        App::$container = $content;
    }

    public static function container() {
        return App::$container;
    }

}