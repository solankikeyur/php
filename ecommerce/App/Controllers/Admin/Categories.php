<?php

namespace App\Controllers\Admin;
use \Core\View;
use \App\Models\Category;
class Categories extends \Core\BaseController {

    public function addAction() {
        $catResult = Category::fetchCat();
        View::renderTemplate("Categories\addCategories.html",['catList' => $catResult]);
    }

    
    public function addCategoryAction() {
        $preparedData = $this->prepareCatData($_POST['category']);
        $preparedData['created_at'] = date('Y-m-d H:i:s', time());
        echo "<pre>";
        print_r($preparedData);
        echo "</pre>";
        echo "Inserted id:=".Category::insertCatData($preparedData);
        //echo "inserted";
        echo $this->displayPopup('Category Added','/cybercom/ecommerce/Public/Admin/Categories');
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


    public function deleteCategoryAction() {
        $id = $this->routeParams['id'];
        Category::deleteCat($id);
        echo "deleted";
    }

    public function editCategoryAction() {
        $id = $this->routeParams['id'];
        $result = Category::fetchCategoryRecord($id);
        $catList = Category::fetchCat();
        View::renderTemplate("Categories/addCategories.html", [
            'categoryData' => $result,
            'task' => 'edit',
            'catList' => $catList
        ]);
    }

    public function updateCatAction() {
        $id = $this->routeParams['id'];
        $prepareData = $this->prepareCatData($_POST['category']);
        Category::updateCat($id,$prepareData);
        echo "Updated";
    }
    public function prepareCatData($data) {
        $preparedData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case 'categoryName'      : $preparedData['name'] = $value;
                                            break;
                case 'description'      : $preparedData['description'] = $value;
                                            break;
                case 'urlKey'           : $preparedData['url_key'] = $value;
                                            break;
                case 'parentCategoryId'         : $preparedData['parent_cat'] = $value;
                                            break;
                case 'status'           : $preparedData['status'] = $value;
                                            break;
            }
        }
        $preparedData['image'] = $this->imageAdd('categoryImage');;
        return $preparedData;
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