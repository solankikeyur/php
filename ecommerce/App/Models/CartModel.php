<?php

namespace App\Models;
use PDO;

class CartModel extends \Core\Model {

    public function insertToCart($productId,$quantity,$userId) {

      $insertQuery = "INSERT INTO `cart`(`p_id`, `quantity`, `cart_user_id`) VALUES ($productId,$quantity,$userId)";
      echo $insertQuery;     
      try {
            $db = static::getDb();
            print_r($db);
            $db->exec($insertQuery);
        } catch(PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    }


    public function removeFromCart($productId, $userId) {
        $removeQuery = "DELETE FROM cart WHERE p_id=$productId AND cart_user_id=$userId";
        $db = static::getDb();
        $db->exec($removeQuery);
        return true;
    }

    public function updateCart($productId, $userId, $quantity) {
        $updateQuery = "UPDATE cart SET quantity = $quantity WHERE cart_user_id=$userId AND p_id=$productId";
        $db = static::getDb();
        $db->exec($updateQuery);
    }
    public function fetchCartData() {
        $userId = $_SESSION['userId'];
        $selectQuery = "SELECT
                                P.*,
                                C.quantity
                            FROM
                                cart AS C
                            LEFT JOIN products AS P
                            ON
                                C.p_id = P.p_id
                            WHERE
                                C.cart_user_id = $userId";
        $db = static::getDb();
        $stmt = $db->query($selectQuery);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products; 
    }
    
}

?>