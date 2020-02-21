<?php

namespace App\Models;
use PDO;
class Category extends \Core\Model {

    public function insertCatData($data) {
        print_r($data);
        return parent::insertData('categories',$data);
    }
    public function fetchCat() {
        return parent::fetchAll('categories');
    }

    public function deleteCat($id) {
        return parent::deleteRecord('categories',"cat_id=$id");
    }

    public function updateCat($id,$data) {
        return parent::updateRecord('categories',$data,"cat_id=$id");
    }

    public function fetchCategoryRecord($id) {
        return parent::fetchRecord('categories',"cat_id=$id");
    }
    public function fetchCategoryUrl($urlKey) {
        return parent::fetchRecord('categories',"url_key='$urlKey'");
    }
    public function fetchCategoryList() {
        $query = "SELECT 
                        parent.name as parentCatName,
                        parent.cat_id,
                        GROUP_CONCAT(child.name) as childCatName,
                        GROUP_CONCAT(child.url_key) as childUrl
                    FROM
                        categories as parent
                    LEFT JOIN
                        categories as child 
                    ON
                        parent.cat_id = child.parent_cat
                    WHERE parent.parent_cat IS NULL
                    GROUP BY parent.cat_id";
        $db = static::getDB();
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>