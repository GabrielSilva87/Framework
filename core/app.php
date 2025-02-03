<?php

namespace Core;

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $this->parseUrl();
        $this->callController();
    }

    protected function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $this->params = explode('/', $url);
            $this->controller = ucfirst(array_shift($this->params)) . 'Controller';
            $this->method = array_shift($this->params) ?: 'index';
        }
    }

    protected function callController() {
        if (file_exists('../app/Controllers/' . $this->controller . '.php')) {
            require '../app/Controllers/' . $this->controller . '.php';
            $controller = new $this->controller;
            call_user_func_array([$controller, $this->method], $this->params);
        } else {
            // Controller não encontrado
            http_response_code(404);
            echo "Controller não encontrado.";
        }
    }
}
