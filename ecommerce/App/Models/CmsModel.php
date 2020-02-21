<?php

namespace App\Models;
use PDO;

class CmsModel extends \Core\Model {
    public function insertCmsData($data) {
        return parent::insertData('cms_pages',$data);
    }
    
    public function fetchCmsData() {
        return parent::fetchAll('cms_pages');
    }

    public function fetchCmsRecord($id) {
        return parent::fetchRecord('cms_pages',"cms_id=$id");
    }
    public function updateCms($id,$data) {
        return parent::updateRecord('cms_pages',$data,"cms_id=$id");
    }

    public function deleteCmsData($id) {
        return parent::deleteRecord('cms_pages',"cms_id=$id");
    }

    public function fetchSinglePage($urlKey) {
        return parent::fetchRecord('cms_pages',"url_key='$urlKey'");
    }

    public function fetchPageList() {        
        return parent::fetchAll('cms_pages');
    }
}

?>