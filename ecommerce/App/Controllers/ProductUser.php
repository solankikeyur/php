<?php

namespace App\Controllers;
use \Core\View;
use \App\Models\CmsModel;
use \App\Models\Category;
use \App\Models\Product;
use PDO;

class ProductUser extends \Core\BaseController {
    
    public function viewProduct() {
        $urlKey = $this->routeParams['urlkey'];
       $products = Product::fetchProductCat($urlKey);
       $productTitle = Category::fetchCategoryUrl($urlKey);
        $categoryList = Category::fetchCategoryList();
        $pageList = CmsModel::fetchPageList();
       View::renderTemplate("User/Category/categoryView.html",[
           'products' => $products,
           'productTitle' => $productTitle[0],
            'pageList' => $pageList,
         'categoryList' => $categoryList
       ]);
     }

     public function productDetail() {

        $urlKey = $this->routeParams['urlkey'];
        $product = Product::fetchProductUrlKey($urlKey);
        $pageList = CmsModel::fetchPageList();
        $categoryList = Category::fetchCategoryList();
        View::renderTemplate("User/Product/productView.html",[
            'product' => $product[0],
            'pageList' => $pageList,
            'categoryList' => $categoryList
        ]);
     }
}

?>