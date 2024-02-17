<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\OrderModel;
use App\Models\UserModel;
use Morilog\Jalali\Jalalian;
use Mpdf\Mpdf;


class OrderBuyerController extends ControllerLoader
{
    private CategoryModel $categoryModel;
    private ProductModel $productModel;
    private OrderModel $orderModel;
    private UserModel $userModel;
    private GeneralHelper $generalHelper;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
        $this->userModel = new UserModel();
        $this->generalHelper = new GeneralHelper();
    }

    public function orderForm()
    {
        $user = $_SESSION['user'];
        $userId = $user->id;
        $orders = $this->orderModel->getOrderByUserId($userId);
        $price = null;
        foreach ($orders as $order) {
            $price = $price + $order->price;
        }
        $menuLang = $this->generalHelper->lang('buyer-menu');
        $lang = $this->generalHelper->lang('buyer-order-page');
        $users = $this->userModel->getUsers();
        echo $this->view()->make('/panel/menus/menu-buyer', ['menuLang' => $menuLang])->render();
        echo $this->view()->make('/panel/orders/order-buyer', ['orders' => $orders, 'price' => $price, 'users' => $users, 'lang' => $lang])->render();
    }

    public function add($productId)
    {
        $order = $this->productModel->getProductById($productId);

        $user = $_SESSION['user'];
        $userId = $user->id;
        if (is_object($order)) {
            $order = get_object_vars($order);
        }
        $order['date'] = Jalalian::forge('today')->format('%A, %d %B %y'); // جمعه، 23 اسفند 97$date = Jalalian::forge('today')->format('%A, %d %B %y'); // جمعه، 23 اسفند 97
        unset($order['image']);
        $order['seller'] = $order['user_id'];
        unset($order['id'], $order['user_id'],);
        $this->orderModel->save($order, $userId);
        $orders = $this->orderModel->getOrders();
        $price=0;
        foreach ($orders as $order){
            if ($_SESSION['user']->id == $order->user_id){
                $price = $price+ $order->price;
            }
        }
        if($price>5500000){
            $_SESSION['doc']=' پولداریا ! مبلغ سبد خرید شما از 550000 هم بیشتز شده ';
        }
        else{
            $_SESSION['doc']='اون ثبت شد بریم واسه بعدی!';
        }
        header('Location: /buyer/product-buyer-form?tab=list_of_products_id');
    }

    public function delete($id)
    {
        $this->orderModel->delete($id);
        header('Location: /buyer/order-form?tab=order_id');
    }

    public function payForm()
    {
        $user = $_SESSION['user'];
        $userId = $user->id;
        $orders = $this->orderModel->getOrderByUserId($userId);
        $price = null;
        foreach ($orders as $order) {
            $price = $price + $order->price;
        }

        $menuLang = $this->generalHelper->lang('buyer-menu');
        echo $this->view()->make('/panel/menus/menu-buyer', ['menuLang' => $menuLang])->render();
        echo $this->view()->make('/panel/orders/pay', ['orders' => $orders, 'price' => $price])->render();
    }


    public function pay()
    {

        $userId = $_SESSION['user']->id;
        $Orders = $this->orderModel->getOrderByUserId($userId);
        $update['number'] = 1;
        if (is_object($Orders)) {
            $Orders = get_object_vars($Orders);
        }
        foreach ($Orders as $order)
        {
            $id = $order->id;
            $this->orderModel->updateOrderById($id , $update);
            $this->payForm();
        }

    }
}