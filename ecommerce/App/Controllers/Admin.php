<?php

namespace App\Controllers;
use \Core\View;
use App\Models\Product;
use App\Models\Category;
use App\Models\CmsModel;
class Admin extends \Core\BaseController {
    public function login() {
        //print_r($_SESSION);
        View::renderTemplate("Admin/login.html");
    }

    public function dashboard() {
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            echo "Invalid Email Address";
        } else {
            if($_POST['email'] == "admin@gmail.com" && $_POST['pass'] == "admin") {
                $_SESSION['loginUser'] = true;
                $_SESSION['userEmail'] = $_POST['email'];
                View::renderTemplate("Admin/dashboard.html");
            } else {
                echo "Invalid Login Details";
            }
        }
    }

    public function CmsAction() {

        $cmsData = CmsModel::fetchCmsData();
        View::renderTemplate("CMS/showCms.html",[
            'cmsData' => $cmsData
        ]);
    }
    public function productsAction() {
        $productList = Product::fetchProducts();
        View::renderTemplate("Products/showProducts.html", [
            'productList' => $productList
        ]);
    }
    public function categoriesAction() {
        $catResult = Category::fetchCat();
        View::renderTemplate("Categories\showCategories.html", ['catList' => $catResult]);
    }

    public function logout() {
        session_destroy();
        header('location:login');
    }
    protected function before() {
        echo "hi";
        if($this->checkSession()) {
            return true;
        } else {
            header('location:login');
            return false;
        }
    }
}


?>