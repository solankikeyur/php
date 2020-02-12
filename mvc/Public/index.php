<?php
//require_once "../Core/Router.php";
//require_once "../App/Controllers/Home.php";
//require_once "../App/Controllers/Posts.php";

require_once dirname(__DIR__). '/vendor/autoload.php';
//Twig_ArrayLoader::register();

spl_autoload_register(function($class){
    $root = dirname(__DIR__); //getparent directory
    $file = $root.'/'.str_replace('\\','/',$class).'.php';
    if(is_readable($file)) {
        require_once $root.'/'.str_replace('\\','/',$class).'.php';
    }
});

$url = $_SERVER['QUERY_STRING'];

echo "Url is:-".$url;

$router = new Core\Router();
//adding routes
$router->add("",['controller' => 'Home','action' => 'index']);
//$router->add("Posts",['controller' => 'Posts','action' => 'index.php']);
$router->add('{controller}/{action}');
$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

//$router->usingPreg($url);
echo "<pre>";
echo htmlspecialchars(print_r($router->getRoutes(),true));
echo "</pre>";

echo "<pre>";
if($router->usingPreg($url)){
    print_r($router->getParams());
}echo "</pre>";
$router->dispatch($url);
?>