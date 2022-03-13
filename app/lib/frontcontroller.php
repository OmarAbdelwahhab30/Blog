<?php
namespace PHPMVC\LIB ;


use ReflectionMethod;

class FrontController{


    private $_controller = "index";
    private $_action = "default";
    private $_params = array(0);

    public function __construct()
    {
        $this->_parseUrl();
        $this->dispatch();
    }

    private function _parseUrl()
    {
        $url = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"), 3);
        if (isset($url[0]) && $url[0] != "") {
            $this->_controller = $url[0];
        }
        if (isset($url[1]) && $url[1] != "") {
            $this->_action = $url[1];
        }
        if (isset($url[2]) && $url[2] != "") {
            $this->_params = explode("/", $url[2]);
        }
    }

    public function dispatch()
    {
        $controllerclassname = "PHPMVC\CONTROLLERS\\" . ucwords($this->_controller);
        if (!class_exists($controllerclassname)) {
            $this->_controller = "notfound";
            $controllerclassname = "PHPMVC\CONTROLLERS\\" . ucwords($this->_controller);
        }
        $obj = new $controllerclassname;
        $methodname = $this->_action;
        if (!method_exists($obj, $this->_action)) {
            $methodname = $this->_action = "notfound";
        }
        call_user_func_array(array($obj, $methodname), $this->_params);
    }
}