<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Post;
use \Core\Model;

class Posts extends \Core\Controller{

    public function indexAction() {
        //echo "THis is index page of Posts controller";
        //echo "<p>Query String Variables:<pre>";
        //echo htmlspecialchars(print_r($_GET,true));
        $posts = Post::getAll();  
        View::renderTemplate("Post/index.html", [
            'posts' => $posts
        ]);
    }

    public function addNewAction() {
        echo "Hello this is add new action";
        

    }

    protected function before() {

    }
    protected function after() {

    }

    
    public function editAction() {
        echo "Hello from edit action";
        echo "Route parameters<pre>";
        echo htmlspecialchars(print_r($this->route_param,true))."</pre>";
    }
}

?>