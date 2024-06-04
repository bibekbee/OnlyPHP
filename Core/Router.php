<?php

namespace Core;

class Router{
    protected $route = [];

    public function add($method, $uri, $controller){
        $this->route[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'middleware' => null
        ];
        return $this;
    }

    public function get($uri, $controller){
        return $this->add('GET',$uri, $controller);
    }
    public function delete($uri, $controller){
        return $this->add('DELETE',$uri, $controller);
    }
    public function post($uri, $controller){
        return $this->add('POST',$uri, $controller);
    }
    public function patch($uri, $controller){
        return $this->add('PATCH',$uri, $controller);
    }

    public function only($key){
        $this->route[array_key_last($this->route)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method){
        foreach($this->route as $route){
            if($route['uri'] == $uri && $route['method'] == $method){
                //apply middleware
                if($route['middleware'] == 'guest'){
                    if($_SESSION['user'] ?? false) {
                        header('location: /');
                    }
                }
                if($route['middleware'] == 'auth'){
                    if(!$_SESSION['user'] ?? false) {
                        header('location: /');
                    }
                }

                return require base_path($route['controller']);
            }
        }
            
        abort();
        
    }

}