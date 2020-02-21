<?php
	require_once '../vendor/autoload.php';

	spl_autoload_register(function ($class) {
		$root = dirname(__DIR__);  //parent dir
		$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
		if(is_readable($file)) {
			require_once $root .'/' . str_replace('\\', '/', $class) . '.php';
		}
	});
	

	$router = new Core\Router();
	$router->add('', ['controller' => 'Main', 'action' => 'index']);
	$router->add('Admin/', ['controller' => 'Admin', 'action' => 'index']);
	//$router->add('{urlkey:[A-z0-9-]+}',['controller' => 'CmsPages', 'action' => 'view']);
	//$router->add('',['urlkey' => 'home','controller' => 'CmsPages', 'action' => 'view']);
	$router->add('{controller}/{action}');	
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('user/', ['controller' => 'User', 'action' => 'index']); 
	$router->add('user/{controller}/{action}', ['namespace' =>'User']); 
	$router->add('admin/{controller}/{action}', ['namespace' =>'Admin']); 

	$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' =>'Admin']);
	//$router->add('{urlkey:[A-z0-9-]+}/{controller}/{action}');

	$url = $_SERVER['QUERY_STRING'];
	$router->dispatch($url);

?>