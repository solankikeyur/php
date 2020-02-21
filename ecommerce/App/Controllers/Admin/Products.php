<?php

namespace App\Controllers\Admin;
use \Core\View;
use App\Models\Category;
use App\Models\Product;


class Products extends \Core\BaseController {

    public function addAction() {
        $catList = Category::fetchCat();
        View::renderTemplate("Products/addProduct.html", [
            'catList' => $catList
        ]);
    }

    public function addProductAction() {
        echo "<pre>";
        print_r($_POST['product']);
        echo "</pre>";
        $prepareData = $this->prepareProductData($_POST['product']);
        $pcData = [];
        
        $lastId = Product::insertProduct($prepareData);

        $pcData['p_id'] = $lastId;
        $pcData['cat_id'] = $_POST['product']['category'];
        Product::insertProductCat($pcData);

    }

    public function imageAdd($fieldName) {
        $uploadDir = '../Public/Images/';
        $uploadFile = $uploadDir . basename($_FILES[$fieldName]['name']);
        $acceptTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if(in_array($_FILES[$fieldName]['type'], $acceptTypes)) {
            move_uploaded_file($_FILES[$fieldName]['tmp_name'], $uploadFile);
            return $uploadDir . $_FILES[$fieldName]['name'];
        }else {
            return false;
        } 
    }
    public function deleteProductAction() {
        $id = $this->routeParams['id'];
        Product::deleteProduct($id);

    }
    public function editProductAction() {
        $id = $this->routeParams['id'];
        $result = Product::fetchProductRecord($id);
        $catList = Category::fetchCat();
        View::renderTemplate("Products/addProduct.html", [
            'productData' => $result,
            'task' => 'edit',
            'catList' => $catList
        ]);
    }

    public function updateProductAction() {
        $id = $this->routeParams['id'];
        $prepareData = $this->prepareProductData($_POST['product']);
        Product::updateProduct($id,$prepareData);
        echo "Updated";
    }

    public function prepareProductData($data) {
        $prepareData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case 'productName' :
                    $prepareData['name'] = $value;
                break;
                case 'productDesc' :
                    $prepareData['description'] = $value;
                break;
                case 'shortDesc' :
                    $prepareData['short_description'] = $value;
                break;
                case 'price' :
                    $prepareData['price'] = $value;
                break;
                case 'stock' :
                    $prepareData['stock'] = $value;
                break;
                case 'urlKey':
                    $prepareData['url_key'] = $value;
                break;
                case 'sku' :
                    $prepareData['sku'] = $value;
                break;
                case 'status':
                    $prepareData['status'] = $value;
                break;
            }
        }
        $prepareData['image'] = $this->imageAdd("image");
        return $prepareData;
    }
    protected function before() {
        echo "hi";
        if($this->checkSession()) {
            return true;
        } else {
            header('location:../login');
        }
    }

}

?>