<?php
namespace App\Controllers;
use \Core\View;
class Home extends \Core\Controller{

    

    protected function before(){
        echo "(before)";
    }

    protected function after(){
        echo "(after)";
    }

    public function indexAction(){
       // View::render('Home/index.php',[ 'name' => 'Keyur', 'colors' => ['Red', 'Blue', 'Green'] ]);
        //echo "THis is index page of Home controller";
        View::renderTemplate('Home/index.html', [
            'name' => 'Keyur',
            'colors' => ['Red','Blue', 'Green']
        ]);
    }
}

?>