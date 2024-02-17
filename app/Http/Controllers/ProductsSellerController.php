<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\UploaderModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\CategoryModel;
use App\Models\UserModel;
use Morilog\Jalali\Jalalian;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Table;
use PhpOffice\PhpSpreadsheet\Worksheet\Table\TableStyle;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductsSellerController extends ControllerLoader
{
    private ProductModel $productModel;
    private CategoryModel $categoryModel;
    private UploaderModel $uploaderModel;
    private GeneralHelper $generalHelper;
    private OrderModel $orderModel;
    private UserModel $userModel;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->orderModel = new OrderModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->uploaderModel = new UploaderModel();
        $this->userModel = new UserModel();
        $this->generalHelper = new GeneralHelper();
    }

    public function productsSellerForm(string $doc = null, string $deleteSuccess = null, string $docUpdate = null)
    {
        $user = $_SESSION['user'];
        $userId = $user->id;
        $profile = $this->uploaderModel->getUserFiles($userId);
        if (is_object($profile)) {
            $profile = get_object_vars($profile);
        }
        if (!empty($profile)) {
            $profilePath = $profile['path'];
        } else {
            $profilePath = 'image/user.png';
        }
        $sale = $this->orderModel->getOrders();
        if (is_object($sale)) {
            $sale = get_object_vars($sale);
        }
        $lang = $this->generalHelper->lang('seller-product-page');
        $categories = $this->categoryModel->getCategories();
        $products = $this->productModel->getProductsByUserid($userId);
        $menuLang = $this->generalHelper->lang('seller-menu');

        echo $this->view()->make('panel/product/product-seller', ['user' => $userId, 'sales' => $sale, 'lang' => $lang, 'updateDoc' => $docUpdate, 'categories' => $categories, 'products' => $products, 'doc' => $doc, 'deleteSuccess' => $deleteSuccess])->render();
        echo $this->view()->make('panel/menus/menu-seller', ['menuLang' => $menuLang])->render();
    }

    public function save()
    {

        if (!empty($_POST)) {
            $user = $_SESSION['user'];
            $userId = $user->id;
            $file = $_FILES['avatar'];
            $fileName = basename($file['name']);
            $targetDir = "public/uploads/product/" . $userId . '/';
            $allowTypes = ['png', 'jpg', 'jpeg', 'tiff'];
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            if (!file_exists($targetDir . $fileType)) {
                mkdir($targetDir . $fileType, 0755, true);
            }

            $targetFilePath = $targetDir . "$fileType/" . $fileName;
            if (in_array($fileType, $allowTypes)) {
                if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    $_POST['image'] = $targetFilePath;

                }
                $this->productModel->save($_POST, $userId);
                $_SESSION['products'] = $_POST;
                $_SESSION['doc'] = 'محصول شما افزوده شد';
                header('Location: /seller/product-seller-form?tab=product_list_id');
            } else {
                $_SESSION['productTypeError'] = 'نمایه حتما باید از نوع png باشد ';
                header('Location: /seller/product-seller-form?tab=product_list');
            }

        }
    }

    public function delete(int $productId)
    {
        $this->productModel->delete($productId);
        $_SESSION['doc'] = " محصول شماره $productId حذف شد  ";
        header('Location: /seller/product-seller-form?tab=product_list_id');
    }


    public function editForm($id)
    {

        $menuLang = $this->generalHelper->lang('seller-menu');
        $product = $this->productModel->getProductById($id);
        if (is_object($product)) {
            $product = get_object_vars($product);
        }
        $categories = $this->categoryModel->getCategories();
        echo $this->view()->make('panel/product/edit-product', ['view' => $this->view(), 'id' => $id, 'product' => $product, 'categories' => $categories])->render();
        echo $this->view()->make('panel/menus/menu-seller', ['menuLang' => $menuLang])->render();
    }

    public function editProduct($id)
    {
        $data = $_POST;
        $data['user_id'] = $_SESSION['user']->id;
        $this->productModel->updateProductById($id, $data);
        $_SESSION['doc'] = " محصول شماره $id ویرایش شد  ";
        header('Location: /seller/product-seller-form?tab=product_list_id');
    }

    public function print($saleId)
    {

        $_SESSION['lang'] = $lang = $this->generalHelper->lang('seller-product-page');
        $order = $this->orderModel->getOrderById($saleId);

        $sale = $order['0'];
        if (is_object($sale)) {
            $sale = get_object_vars($sale);
        }
        $buyer = $this->userModel->getUserById($sale['user_id']);
        if (is_object($buyer)) {
            $buyer = get_object_vars($buyer);
        }
        $userId = $_SESSION['user']->id;
        $phone = $_SESSION['user']->phone_number;
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        $index = str_replace($english, $persian, $sale['price']);
        $index1 = $sale['price'] * 0.09;
        $index2 = $sale['price'] * 0.05;
        $index3 = $sale['price'] - $index2 + $index1;
        $index1 = str_replace($english, $persian, $index1);
        $index2 = str_replace($english, $persian, $index2);
        $index3 = str_replace($english, $persian, $index3);
        $_SESSION['index1'] = $index1;
        $_SESSION['index2'] = $index2;
        $_SESSION['index3'] = $index3;
        $sale['id'] = str_replace($english, $persian, $sale['id']);
        $userId = str_replace($english, $persian, $userId);
        $phone = str_replace($english, $persian, $phone);
        $_SESSION['target']->id = $userId;
        $_SESSION['target']->phone = $phone;
        unset($sale['price']);
        $_SESSION['price'] = $index;
        $_SESSION['sale'] = $sale;
        $_SESSION['buyer'] = $buyer;

        $html = $this->view()->make('/panel/orders/sale')->render();
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
        $seller = $_SESSION['user']->name;
        $sellerE = $_SESSION['user']->email;
        $buyerN = $buyer['name'];
        $buyerE = $buyer['email'];
        $product = $sale['name'];
        $productP = $sale['price'];
        $tax = $productP * 0.09;
        $tax2 = $productP * 0.05;
        $receipt = $productP + $tax - $tax2;
//        excel factor
//        $spreadsheet = new Spreadsheet();
//        $sheet = $spreadsheet->getActiveSheet();
//        $sheet->setCellValue('A2', 'seller name :');
//        $sheet->setCellValue('C2', $seller);
//        $sheet->setCellValue('A3', 'seller email :');
//        $sheet->setCellValue('C3', $sellerE);
//        $sheet->setCellValue('A5', 'buyer name :');
//        $sheet->setCellValue('C5', "$buyerN");
//        $sheet->setCellValue('A6', 'buyer email :');
//        $sheet->setCellValue('C6', "$buyerE");
//        $sheet->setCellValue('A8', 'product name :');
//        $sheet->setCellValue('D8', "$product");
//        $sheet->setCellValue('A9', "product price =");
//        $sheet->setCellValue('C9', "$productP t");
//        $sheet->setCellValue('A10', "tax =");
//        $sheet->setCellValue('C10', "$tax t");
//        $sheet->setCellValue('A11', "right to sell =");
//        $sheet->setCellValue('C11', "$tax2 t");
//        $sheet->setCellValue('A12', "Receipt =");
//        $sheet->setCellValue('C12', "$receipt t");
//        $sheet->getStyle("A1:E12")->getFont()->setSize(12);
//        $writer = new Xlsx($spreadsheet);
//
//
//        $table = new Table('A1:E12', 'Table1');
//
//        $tableStyle = new TableStyle();
//        $tableStyle->setTheme(TableStyle::TABLE_STYLE_MEDIUM9);
//        $tableStyle->setShowRowStripes(true);
//        $table->setStyle($tableStyle);
//        $sheet->addTable($table);
//        $writer->save('5.xlsx');

    }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $orders = $this->orderModel->getOrders();
        $number = 0;
        $target = 2;

        $buyers = $this->userModel->getUsers();

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
                foreach ($buyers as $buyer) {
                    if (is_object($buyer)) {
                        $buyer = get_object_vars($buyer);
                    }
                    if ($buyer['id'] == $order['user_id']) {
                        $seller = $order['seller'];
                        $user = $_SESSION['user']->id;
                        if ($seller == $user) {
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
            $sellers = $this->userModel->getUsers();

            foreach ($orders as $order) {
                if (is_object($order)) {
                    $order = get_object_vars($order);
                }
                foreach ($buyers as $buyer) {
                    if (is_object($buyer)) {
                        $buyer = get_object_vars($buyer);
                    }
                    if ($buyer['id'] == $order['user_id']) {
                        $seller = $order['seller'];
                        $user = $_SESSION['user']->id;
                        if ($seller == $user) {
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
                            $sheet->setCellValue("N$target", "$buyerEmail");
                            $sheet->setCellValue("O$target", "$date");
                            $sheet->setCellValue("Q$target", "$seller");
                            $sheet->setCellValue("U$target", "$sellerE");
                        }
                    }


                }
            }
            $sheet->setRightToLeft(true);
        }

        $sheet->getStyle("A1:T100")->getFont()->setSize(12);
        $writer = new Xlsx($spreadsheet);
        $table = new Table('A1:T100', 'Table1');
        $tableStyle = new TableStyle();
        $tableStyle->setTheme(TableStyle::TABLE_STYLE_MEDIUM9);
        $tableStyle->setShowRowStripes(true);
        $table->setStyle($tableStyle);
        $sheet->addTable($table);
//        $str = rand();
//        $result = md5($str);
        $userId = $_SESSION['user']->id;
        $file = "$userId.xlsx";
        if (!file_exists($file)) {
            $writer->save("$file");
        } else {
            unlink($file);
            $writer->save("$file");
        }

        $_SESSION['file'] = $file;
        $menuLang = $this->generalHelper->lang('seller-menu');
        echo $this->view()->make('/panel/excel/download', ['file' => $file, 'name' => $file])->render();
        echo $this->view()->make('panel/menus/menu-seller', ['menuLang' => $menuLang])->render();

    }

}