<?php

namespace App\Controllers;
use PDO;
use App\Models\CartModel;
use App\Models\Product;

class Cart extends \Core\BaseController {

    public function addCart() {
         $productId = $_POST['cartData']['productId'];
        $quantity = $_POST['cartData']['quantity'];
        $userId = $_SESSION['userId'];
        CartModel::insertToCart($productId, $quantity,$userId);

    }

    public function displayCart() {
        // $cartData = CartModel::fetchCartData();
        // $prdocutName = [];
        // for($i = 0;$i < count($cartData);$i++) {
        //   //array_push($prdocutName, $cartData[$i]["quantity"]);
        //   $productResult = Product::fetchProductRecord($cartData[$i]["p_id"]);
        //   array_push($prdocutName,$productResult);
        //   $prdocutName[$i]['quantity'] = $cartData[$i]["quantity"];
        // }
       $products = CartModel::fetchCartData();
        echo json_encode($products);
       
    }
    public function removeCart() {
        $productId = $_POST['productId'];
        //echo json_encode($productId);
        $userId = $_SESSION['userId'];
        if(CartModel::removeFromCart($productId, $userId)) {
            echo json_encode("deleted");
        }
    }

    public function updateCart() {

        $productId = $_POST['p_id'];
        $quantity = $_POST['quant'];
        $userId =  $_SESSION['userId'];
       // echo $productId;
        
        if(CartModel::updateCart($productId, $userId, $quantity)) {
            echo json_encode("updated");
        }
    }
}

?>