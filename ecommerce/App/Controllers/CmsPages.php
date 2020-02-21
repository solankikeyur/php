<?php
namespace App\Controllers;
use \Core\View;
use \App\Models\CmsModel;
use \App\Models\Category;
use \App\Models\Product;
use PDO;


class CmsPages extends \Core\BaseController {

    public function viewAction() {
        $urlKey = $this->routeParams['urlkey'];
        $pageData = CmsModel::fetchSinglePage($urlKey);
        $categoryList = Category::fetchCategoryList();
        $pageList = CmsModel::fetchPageList();
        View::renderTemplate("User/Cms/cmsView.html", ['pageData' => $pageData[0],
                                                        'pageList' => $pageList,
                                                        'categoryList' => $categoryList]);
    }

    
}

?>