<?php

namespace Core;

abstract class BaseController {    
    protected $routeParams = [];   

    public function __construct($routeParameters) {
        $this->routeParams = $routeParameters;
        session_start();
        // session_destroy();
    }

    public function __call($methodName, $args) {    
        $methodName = $methodName . 'Action';
        if(method_exists($this, $methodName)) {
            if($this->before() !== false) {
                call_user_func_array([$this, $methodName] , $args);
                $this->after();
            }
        }else {
            throw new \Exception("$methodName not found in class " . get_class($this));
        }
    }
    protected function before() { 

    }               //called before action performed
    protected function after() {

    }               //called after action performed
    protected function checkSession() {
        if($_SESSION['loginUser'] == true) {
            return true;
        }
    }
}

?>