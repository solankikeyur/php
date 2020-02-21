<?php  

namespace App\Controllers\Admin;
use \Core\View;
use \App\Models\CmsModel;

class Cms extends \Core\BaseController {
    public function addCms() {
        View::renderTemplate("CMS/addCms.html");
    }

    public function addCmsDataAction() {
        $prepareData = $this->preparCmsData($_POST['cms']);
        CmsModel::insertCmsData($prepareData);
    }

    public function editCmsAction() {
        $id = $this->routeParams['id'];
        $cmsData = CmsModel::fetchCmsRecord($id);
        View::renderTemplate("CMS/addCms.html",[
            'task' => 'edit',
            'cmsData' => $cmsData
        ]);
    }

    public function deleteCmsAction() {
        $id = $this->routeParams['id'];
        CmsModel::deleteCmsData($id);
    }

    protected function before() {
        echo "hi";
        if($this->checkSession()) {
            return true;
        } else {
            header('location:../login');
        }
    }

    public function updateCmsDataAction() {
        $id = $this->routeParams['id'];
        $prepareData = $this->preparCmsData($_POST['cms']);
        CmsModel::updateCms($id,$prepareData);
    }
    public function preparCmsData($data) {
        $prepareData = [];
        foreach ($data as $key => $value) {
            switch($key) {
                case 'content':
                    $prepareData['content'] = $value;
                break;
                case 'title':
                    $prepareData['page_title'] = $value;
                break;
                case 'urlKey':
                    $prepareData['url_key'] = $value;
                break;
                case 'status':
                    $prepareData['status'] = $value;
                break;
            }
        }
        return $prepareData;
    }
}


?>