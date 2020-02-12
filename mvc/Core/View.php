<?php
namespace Core;

class View {

    public static function render($view, $args = [] ) {
        extract($args, EXTR_SKIP);
        $file = "../App/Views/$view";
        if(is_readable($file)) {
            require $file;
        } else {
            echo "File not found";
        }
    }

    public static function renderTemplate($template, $args = []){
        static $twig = null;
        if($twig == null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/Views');
            //$loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig\Environment($loader);
        }
        echo $twig->render($template, $args);
    }
}

?>