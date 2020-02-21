<?php

namespace Core;

class View {
    public static function renderView($viewFile, $args = []) {
        $file = "../App/Views/$viewFile"; 
        extract($args);
        if(is_readable($file)) {
            require_once $file;
        }else {
            throw new \Exception("$file not found!");
        }
    }
    public static function renderTemplate($template, $args = []) {
        static $twig = null;
        if($twig == null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            $twig = new \Twig\Environment($loader);
            //$twig->addGlobal('session', $_SESSION);
        }  
        echo $twig->render($template, $args);
    }
}

?>