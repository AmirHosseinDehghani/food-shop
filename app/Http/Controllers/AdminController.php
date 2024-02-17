<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Core\Loader\ControllerLoader;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class AdminController extends ControllerLoader
{
    private UserModel $userModel;
    private ProductModel $productModel;
    private CategoryModel $categoryModel;


    public function __construct()
    {
        session_start();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    public function userSettingForm()
    {
        $users = $this->userModel->getUsers();
        echo $this->view()->make('/panel/admin/user-setting', ['users' => $users])->render();
        echo $this->view()->make('/panel/menus/menu-admin')->render();
    }

    public function userDelete($userId)
    {
        $product = $this->productModel->getProductsByUserid($userId);
        if (!empty($product)) {
            $this->productModel->deleteAll();
        }
        $category = $this->categoryModel->getCategoryByUserid($userId);
        if (!empty($category)) {
            $this->categoryModel->deleteAll();
        }
        $this->userModel->delete($userId);
    }
    public function productSettingForm()
    {
        $products=$this->productModel->getProduct();
        $users=$this->userModel->getUsers();
        $categories=$this->categoryModel->getCategories();
        echo $this->view()->make('/panel/admin/product-setting', ['products' => $products,'users'=>$users,'categories'=>$categories])->render();
        echo $this->view()->make('/panel/menus/menu-admin')->render();
    }
    public function productDelete($productId)
    {
        $this->productModel->delete($productId);
    }
    public function categorySettingForm()
    {
        $users=$this->userModel->getUsers();
        $categories=$this->categoryModel->getCategories();
        echo $this->view()->make('/panel/admin/category-setting', ['users'=>$users,'categories'=>$categories])->render();
        echo $this->view()->make('/panel/menus/menu-admin')->render();
    }
    public function categoryDelete($categoryId)
    {
        $this->categoryModel->delete($categoryId);
    }
    public function save()
    {
        if (!empty($_POST)) {
            $this->categoryModel->save($_POST);
            $_SESSION['category']=$_POST;
            $this->categorySettingForm();
        }

    }
    public function delete(int $categoryId)
    {

        $this->categoryModel->delete($categoryId);
        header('Location:/categories-seller-form');

    }
}