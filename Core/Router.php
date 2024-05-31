<?php

namespace Core;

class Router{
    protected $route = [];

    public function add($method, $uri, $controller){
        return [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    public function get($uri, $controller){
        $result = $this->add('GET',$uri, $controller);
        $this->route[] = $result;
    }
    public function delete($uri, $controller){
        $result =  $this->add('DELETE',$uri, $controller);
        $this->route[] = $result;
    }
    public function post($uri, $controller){
        $result = $this->add('POST',$uri, $controller);
        $this->route[] = $result;
    }
    public function patch($uri, $controller){
        $result = $this->add('PATCH',$uri, $controller);
        $this->route[] = $result;
    }

    public function route($uri, $method){
        foreach($this->route as $route){
            if($route['uri'] == $uri && $route['method'] == $method){
                return require base_path($route['controller']);
            }
        }
            
        abort();
        
    }
}