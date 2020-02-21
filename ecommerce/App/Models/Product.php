<?php

namespace App\Models;
use PDO;
class Product extends \Core\Model {

    public function insertProduct($data) {
        return parent::insertData('products',$data);
    }

    public function fetchProducts() {
        return parent::fetchAll('products');
    }

    public function insertProductCat($data) {
        return parent::insertData('products_categories',$data);
    }
    public function deleteProduct($id) {
        return parent::deleteRecord('products',"p_id=$id");
    }

    public function fetchProductRecord($id) {
        return parent::fetchRecord('products',"p_id=$id");
    }

    public function fetchProductUrlKey($urlKey) {
        return parent::fetchRecord('products',"url_key='$urlKey'");
    }
    public function fetchProductCat($urlKey) {

        $selectQuery = "SELECT
                                p.*
                            FROM
                                products AS p
                            INNER JOIN products_categories AS pc
                            ON
                                p.p_id = pc.p_id
                            INNER JOIN categories AS c
                            ON
                                c.cat_id = pc.cat_id
                            WHERE
                                c.url_key = '$urlKey'";
        $db = static::getDb();
        $stmt = $db->query($selectQuery);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function updateProduct($id,$data) {
        return parent::updateRecord('products',$data,"p_id=$id");
    }

}

?>