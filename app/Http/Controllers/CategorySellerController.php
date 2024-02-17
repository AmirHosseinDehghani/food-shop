<?php

namespace App\Http\Controllers;

use App\Models\UploaderModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\CategoryModel;

class CategorySellerController extends ControllerLoader
{
    private CategoryModel $categoryModel;
    private UploaderModel $uploaderModel;
    private GeneralHelper $generalHelper;
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->categoryModel = new CategoryModel();
        $this->uploaderModel = new UploaderModel();
        $this->generalHelper = new GeneralHelper();
    }

    public function categoryForm()
    {
        $categories=$this->categoryModel->getCategories();
        $user = $_SESSION['user'];
        $userId = $user->id;
        $profile = $this->uploaderModel->getUserFiles($userId);

        if (!empty($profile)) {
            $profilePath = $profile->path;
        }
        else
        {
            $profilePath = 'image/user.png';
        }
        $menuLang =$this->generalHelper->lang('seller-menu');
        $lang =$this->generalHelper->lang('seller-category');
        $type = $_SESSION['user']->type;
        echo $this->view()->make("panel/menus/menu-$type", ['profile' => $profilePath,'menuLang'=>$menuLang])->render();
        echo $this->view()->make('panel/category-seller', ['categories'=>$categories,'lang'=>$lang])->render();
    }


}