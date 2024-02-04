<?php
    
    class App
    {
        protected $routes = [];
        public function get($uri, $controller)
        {
            $this->routes['GET'][$uri] = $controller;
        }

        public function post($uri, $controller)
        {
            $this->routes['POST'][$uri] = $controller;
        }

        public function callController($controller)
        {
            list($controllerName, $methodName) = explode('@', $controller);
            require_once __DIR__ . "/../app/controller/" . $controllerName . ".php";
            $controllerInstance = new $controllerName();
            $controllerInstance->$methodName();
        }

        public function run()
        {
            $method = $_SERVER["REQUEST_METHOD"];
            $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            $controller = $this->routes[$method][$uri];
            $this->callController($controller);
        }
    }