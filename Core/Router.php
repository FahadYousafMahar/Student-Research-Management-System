<?php
namespace Myweb\Core;

/**
 * Router Class
 */
class Router
{
    protected $routes = [
    'GET' => [],
    'POST'=> []
];

    public static function define($file)
    {
        $routes = new self;
        require $file;
        return $routes;
    }

    public function get($uri, $controller)
    {
        // Registering GET request to Routes
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        // Registering POST request to Routes
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $method, $data = null)
    {
      
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->atHandler($data,
                ...explode('@', $this->routes[$method][$uri])
            );
        } else {
            header('Location: /404');
        }
    }

    protected function atHandler($data, $controller, $method)
    {
      //die();
        $controller = "Myweb\\Controllers\\{$controller}";
        $controller = new $controller;
        if (!method_exists($controller, $method)) {
            throw new \Exception("{$method} for {$controller} does not exists ! ");
        }else if($data != null){
          return $controller->$method($data);
        }else {
        return $controller->$method();
        }
    }
}
