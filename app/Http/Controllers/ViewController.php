<?php

namespace App\Http\Controllers;


use App\Models\CategoryModel;
use App\Models\UserModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\ProductModel;
use App\Models\OrderModel;


class ViewController extends ControllerLoader
{
    private ProductModel $productModel;
    private CategoryModel $categoryModel;
    private GeneralHelper $generalHelper;
    private UserModel $userModel;
    private OrderModel $orderModel;


    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->generalHelper = new GeneralHelper();
        $this->userModel = new UserModel();
        $this->orderModel = new OrderModel();
    }

    public function homeSeller()
    {
        $lang = $this->generalHelper->lang('seller-home-page');
        $menuLang = $this->generalHelper->lang('seller-menu');
        $userId = $_SESSION['user']->id;
        $products = $this->productModel->getProductsByUserid($userId);
        $productNumber = 0;
        foreach ($products as $product) {
            $productNumber = $productNumber + 1;
        }
        $pizza = 0;
        $pasta = 0;
        $iranian = 0;
        $burger = 0;
        $price = 0;
        $price2 = 0;
        $id = $_SESSION['user']->id;
        $orders = $this->orderModel->getOrders();
        $categories = $this->categoryModel->getCategories();
        foreach ($orders as $order) {
            foreach ($categories as $category) {
                if ($order->category_id == $category->id) {
                    $orderCategory = $category->id;
                    $seller = $order->seller;

                    $price = $order->price;
                    $price2 = +$price;
                    if ($seller == $id) {

                        if ($orderCategory == '88') {

                            $pasta++;
                        }
                        if ($orderCategory == '91') {
                            $pizza++;

                        }
                        if ($orderCategory == '90') {
                            $burger++;
                        }

                        if ($orderCategory == ' 89') {
                            $iranian++;
                        }
                    }


                }
            }
        }
        unset($id ,$userId);
        echo $this->view()->make('panel/menus/menu-seller', ['menuLang' => $menuLang])->render();
        echo $this->view()->make('panel/home/home-seller', ['sale'=>$price2 ,'pizza' => $pizza, 'burger' => $burger, 'iranian' => $iranian, 'pasta' => $pasta, 'productNumber' => $productNumber, 'lang' => $lang,])->render();

    }

    public function homeBuyer()
    {
        $lang = $this->generalHelper->lang('buyer-home-page');
        $menuLang = $this->generalHelper->lang('buyer-menu');
        $product = $this->productModel->getProduct();
        $categories = $this->categoryModel->getCategories();
        echo $this->view()->make('panel/menus/menu-buyer', ['menuLang' => $menuLang])->render();
        echo $this->view()->make('panel/home/home-buyer', ['products' => $product, 'categories' => $categories, 'lang' => $lang])->render();

    }

    public function homeAdmin()
    {
        echo $this->view()->make('panel/menus/menu-admin')->render();
        echo $this->view()->make('panel/home-seller')->render();
    }

    public function searchForm(array $content = null)
    {
        echo $this->view()->make('/panel/search-buyer', ['content' => $content])->render();
        echo $this->view()->make('panel/menus/menu-buyer')->render();
    }

//    public function search()
//    {
//        if (!empty($_POST)) {
//            $content = $this->productModel->getProductByName($_POST['value']);
//            if (!empty($content)) {
//                $this->searchForm($content);
//                print_r($content);
//                exit();
//            } else {
//                $content = $this->categoryModel->getCategoryByName($_POST['value']);
//
//                $this->searchForm($content);
////                if (empty($content)) {
////                    $content = 'your search is null';
////                    $this->searchForm($content);
////                }
//            }
//
//        }
//        }

}