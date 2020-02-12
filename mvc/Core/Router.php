<?php
namespace Core;

class Router {

    protected $routes = [];
    protected $params = [];

    function add($route,$params = []){

        //convert route to a regular expression
        $route = preg_replace('/\//','\\/',$route);
        //convert variable
        $route = preg_replace('/{([a-z]+)}/','(?P<\1>[a-z-]+)',$route);
        //convert custom variable
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)',$route);
        $route = '/^'.$route.'$/i';
        $this->routes[$route] = $params;
    }

    function getRoutes(){
        return $this->routes;
    }

    function matchUrl($url,$routes){
        foreach ($routes as $route => $params) {
            if($url == $route){
                $this->params = $params;
            }
        }
    }

    function getParams(){
        return $this->params;
    }

    function matchString($string){
        if(preg_match("/(?P<month>[a-zA-Z]+)\s(?P<year>[0-9]+)/",$string,$matched)){
            return $matched;
        }
    }
 
    function usingPreg($url){
        /** $regex = "/^(?P<controller>[a-z-A-Z]+)\/(?P<action>[a-z-A-Z]+)$/";
        if(preg_match($regex,$url,$matches)){
            
            foreach ($matches as $key => $value) {
                if(is_string($key)){
                    $this->params[$key] = $value;
                }
            }
        }  **/
        foreach ($this->routes as $route => $params) {
            if(preg_match($route,$url,$matches)){
                foreach ($matches as $key => $match) {
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function dispatch($url){
        
        $url = $this->removeQueryStringVariables($url);
        if($this->usingPreg($url)){

            $controller = $this->params["controller"];
            //$controller = "App\Controllers\\$controller";
            $controller = $this->getNameSpace(). $controller;
            echo "This is ".$controller."<br>";
            if(class_exists($controller)){
                $controller_object = new $controller($this->params);
                $action = $this->params["action"];

                if(is_callable([$controller_object,$action])){
                    $controller_object->$action();
                }else{
                    echo "Method $action not found";
                }
            }else{
                echo "Class $controller not found";
            }
        }else{
            echo "No route found";
        }
    }

protected function removeQueryStringVariables($url){
    if($url != ''){
        $parts = explode('&',$url,2);
        if(strpos($parts[0],'=') === false){
            $url = $parts[0];
        }else{
            $url = '';
        }
    }
    return $url;
}

protected function getNameSpace(){
    $namespace = 'App\Controllers\\';
    if(array_key_exists('namespace',$this->params)) {
        $namespace .= $this->params['namespace']. '\\';
    }
    return $namespace;
}

}

?>