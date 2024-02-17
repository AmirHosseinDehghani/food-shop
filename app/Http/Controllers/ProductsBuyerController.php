<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\CategoryModel;
use App\Models\UserModel;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\OrderModel;

class ProductsBuyerController extends ControllerLoader
{
    private ProductModel $productModel;
    private CategoryModel $categoryModel;
    private UserModel $userModel;
    private GeneralHelper $generalHelper;
    private OrderModel $orderModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
        $this->generalHelper = new GeneralHelper();
        $this->orderModel = new OrderModel();
    }

    public function productsBuyerForm(string $massage = null)
    {
        $categories = $this->categoryModel->getCategories();
        shuffle($categories);
        $langMenu = $this->generalHelper->lang('buyer-menu');
        $lang = $this->generalHelper->lang('buyer-product-page');
        $products = $this->productModel->getProduct();
        $users = $this->userModel->getUsers();
        echo $this->view()->make('/panel/menus/menu-buyer', ['menuLang' => $langMenu])->render();
        echo $this->view()->make('/panel/product/product-buyer', ['message' => $massage, 'products' => $products, 'users' => $users, 'categories' => $categories, 'lang' => $lang])->render();
    }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $orders = $this->orderModel->getOrders();
        $number = 0;
        $target = 2;
        if ($_SESSION['general'] == 'en') {
            $sheet->setCellValue("A2", "***");
            $sheet->setCellValue("B2", "id");
            $sheet->setCellValue("C2", "name");
            $sheet->setCellValue("F2", "price");
            $sheet->setCellValue("H2", "buyer id");
            $sheet->setCellValue("I2", "buyer name");
            $sheet->setCellValue("K2", "buyer email");
            $sheet->setCellValue("O2", "date");
            $sheet->setCellValue("Q2", "seller name");
            $sheet->setCellValue("S2", "seller email");
            $sellers = $this->userModel->getUsers();

            foreach ($orders as $order) {
                if (is_object($order)) {
                    $order = get_object_vars($order);
                }
                foreach ($sellers as $seller) {
                    if (is_object($seller)) {
                        $seller = get_object_vars($seller);
                    }
                    if ($seller['id'] == $order['seller']) {
                        $buyer = $order['user_id'];
                        $user = $_SESSION['user']->id;
                        if ($buyer == $user) {
                            $number = $number + 1;
                            $target = $target + 1;
                            $id = $order['id'];
                            $name = $order['name'];
                            $price = $order['price'];
                            $buyerId = $buyer['id'];
                            $buyerName = $buyer['name'];
                            $buyerEmail = $buyer['email'];
                            $date = $order['date'];
                            $seller = $_SESSION['user']->name;
                            $sellerE = $_SESSION['user']->email;
                            $sheet->setCellValue("A$target", "order $number:");
                            $sheet->setCellValue("B$target", "$id    ");
                            $sheet->setCellValue("C$target", "$name");
                            $sheet->setCellValue("F$target", "$price");
                            $sheet->setCellValue("H$target", "$buyerId    ");
                            $sheet->setCellValue("I$target", "$buyerName");
                            $sheet->setCellValue("K$target", "$buyerEmail");
                            $sheet->setCellValue("O$target", "$date");
                            $sheet->setCellValue("Q$target", "$seller");
                            $sheet->setCellValue("S$target", "$sellerE");
                        }
                    }


                }
            }
        } else {
            $userId = $_SESSION['user']->id;
            $sheet->setCellValue("A2", "***");
            $sheet->setCellValue("B2", " سفارش");
            $sheet->setCellValue("C2", "نام سفارش");
            $sheet->setCellValue("F2", "قیمت");
            $sheet->setCellValue("H2", "خریدار");
            $sheet->setCellValue("I2", "نام خریدار");
            $sheet->setCellValue("L2", "ایمیل خریدرا");
            $sheet->setCellValue("O2", "تاریخ سفارش");
            $sheet->setCellValue("Q2", "نام فروشنده");
            $sheet->setCellValue("S2", "ایمیل فروشنده");
            $buyers = $this->userModel->getUsers();
            $sellers = $this->userModel->getUsers();
            foreach ($orders as $order) {
                if (is_object($order)) {
                    $order = get_object_vars($order);
                }
                foreach ($sellers as $seller) {
                    if (is_object($seller)) {
                        $seller = get_object_vars($seller);
                    }
                    if ($seller['id'] == $order['seller']) {
                        $buyer = $order['user_id'];
                        if ($buyer == $userId) {
                            $number = $number + 1;
                            $target = $target + 1;
                            $id = $order['id'];
                            $name = $order['name'];
                            $price = $order['price'];
                            $buyerId = $_SESSION['user']->id;
                            $buyerName = $_SESSION['user']->name;
                            $buyerEmail = $_SESSION['user']->email;
                            $date = $order['date'];
                            $sellerN = $seller['name'];
                            $sellerE = $seller['email'];
                            $sheet->setCellValue("A$target", "order $number:");
                            $sheet->setCellValue("B$target", "$id    ");
                            $sheet->setCellValue("C$target", "$name");
                            $sheet->setCellValue("F$target", "$price");
                            $sheet->setCellValue("H$target", "$buyerId    ");
                            $sheet->setCellValue("I$target", "$buyerName");
                            $sheet->setCellValue("N$target", "$buyerEmail");
                            $sheet->setCellValue("O$target", "$date");
                            $sheet->setCellValue("Q$target", "$sellerN");
                            $sheet->setCellValue("U$target", "$sellerE");
                        }
                    }
                }
            }
            $sheet->setRightToLeft(true);
        }


        $sheet->getStyle("A1:T100")->getFont()->setSize(12);
        $writer = new Xlsx($spreadsheet);

        $tableStyle = new TableStyle();
        $tableStyle->setTheme(TableStyle::TABLE_STYLE_MEDIUM9);
        $tableStyle->setShowRowStripes(true);


        $str = rand();
        $result = md5($str);
        $file = "$result.xlsx";
        $writer->save("$file");
        $_SESSION['file'] = $file;
        $menuLang = $this->generalHelper->lang('buyer-menu');
        echo $this->view()->make('/panel/excel/download', ['file' => $file, 'name' => $result])->render();
        echo $this->view()->make('panel/menus/menu-buyer', ['menuLang' => $menuLang])->render();
    }

    public function print(int $id)
    {
        $order = $this->orderModel->getOrderById($id);
        $order = $order['0'];
        if (is_object($order)) {
            $order = get_object_vars($order);
        }
        $seller = $this->userModel->getUserById($order['seller']);
        if (is_object($seller)) {
            $seller = get_object_vars($seller);
        }
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

        $index = $order['price'] * 0.09;
        $index1 = $order['price'] * 0.05;

        $index2 = $order['price'] + $index - $index1;
        $index = str_replace($english, $persian, $index);
        $index1 = str_replace($english, $persian, $index1);
        $index2 = str_replace($english, $persian, $index2);
        $order['price'] = str_replace($english, $persian, $order['price']);
        $order['id'] = str_replace($english, $persian, $order['id']);
        $seller['id'] = str_replace($english, $persian,  $seller['id']);
        $seller['phone_number'] = str_replace($english, $persian,  $seller['phone_number']);
        $_SESSION['index'] = $index;
        $_SESSION['index1'] = $index1;
        $_SESSION['index2'] = $index2;
        $_SESSION['seller'] = $seller;
        $_SESSION['order'] = $order;

        $_SESSION['lang'] = $lang = $this->generalHelper->lang('seller-product-page');
        $html = $this->view()->make('/panel/orders/list');
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4-L',
            'orientation' => 'P',
            'margin_left' => '10',
            'margin_right' => '5',
            'margin_top' => '3',
            'margin_bottom' => '0',
            'margin_header' => '0',
            'margin_footer' => '3',
            'default_font' => 'shabnam',
            'watermark_font' => 'shabnam',
        ]);

        $mpdf->WriteHTML("$html");
        $mpdf->Output();

    }

}