<?php

$router = new \Bramus\Router\Router();

$router->setNamespace('App\Http\Controllers');

//$router->get('/', 'HomePageController@homeForm');

$router->get('/file-upload', 'UploadController@uploadForm');
$router->get('/user-files', 'UploadController@getUserFiles');
$router->get('/delete-file/(\d+)', 'UploadController@deleteUserFile');
$router->post('/upload', 'UploadController@upload');
$router->get('/seller/home', 'ViewController@homeSeller');
$router->get('buyer/home', 'ViewController@homeBuyer');


$router->get('/admin/home', 'ViewController@homeAdmin');
$router->get('/admin/user-setting', 'AdminController@userSettingForm');
$router->get('/admin/product-setting', 'AdminController@productSettingForm');
$router->get('/admin/category-setting', 'AdminController@categorySettingForm');
$router->get('/admin/user/delete/(\d+)', 'AdminController@userDelete');
$router->get('/admin/product/delete/(\d+)', 'AdminController@productDelete');
$router->get('/admin/category/delete/(\d+)', 'AdminController@categoryDelete');


$router->get('/signup-form', 'SignupController@signupForm');
$router->get('/logout', 'LoginController@logout');

$router->post('/signup', 'SignupController@signup');
$router->post('/verify', 'SignupController@verify');
$router->get('/verify-form', 'SignupController@verifyForm');
$router->get('/forgot-password-form', 'ForgotPasswordController@forgotPasswordForm');
$router->post('/check', 'ForgotPasswordController@check');
$router->get('/reset-password-form', 'ForgotPasswordController@resetPasswordForm');
$router->post('/reset-password', 'ForgotPasswordController@resetPassword');

$router->post('/login', 'LoginController@login');
$router->get('/', 'LoginController@loginForm');

$router->get('/profile-form', 'ProfileController@profileForm');
$router->post('/upload-profile', 'ProfileController@upload');
$router->get('/delete-profile/(\d+)', 'ProfileController@deleteUserFile');
$router->post('/edit-profile', 'ProfileController@editProfile');
$router->post('/edit-password', 'ProfileController@editPassword');

$router->get('/categories-seller-form', 'CategorySellerController@categoryForm');
$router->post('/add-category', 'AdminController@save');
$router->get('/category/delete/(\d+)', 'CategorySellerController@delete');

$router->get('/seller/product/delete/(\d+)', 'ProductsSellerController@delete');
$router->get('/seller/product/edit-form/(\d+)', 'ProductsSellerController@editForm');
$router->post('/seller/product/edit/(\d+)', 'ProductsSellerController@editProduct');
$router->get('/seller/product/print/(\d+)', 'ProductsSellerController@print');
$router->get('/seller/product-seller-form', 'ProductsSellerController@productsSellerForm');
$router->get('/seller/product-excel', 'ProductsSellerController@excel');
$router->post('/add-product', 'ProductsSellerController@save');

$router->get('/buyer/product-buyer-form', 'ProductsBuyerController@productsBuyerForm');
$router->get('/buyer/excel', 'ProductsBuyerController@excel');

$router->get('/buyer/add-to-oder/(\d+)', 'OrderBuyerController@add');
$router->get('/buyer/order-form', 'OrderBuyerController@orderForm');
$router->get('/buyer/delete-order/(\d+)', 'OrderBuyerController@delete');
$router->get('/buyer/pay-form', 'OrderBuyerController@payForm');
$router->get('/buyer/print-order/(\d+)', 'ProductsBuyerController@print');
$router->post('/buyer/pay-order', 'OrderBuyerController@pay');

$router->get('/send-mail', 'SendEmailController@sendEmail');

$router->get('/seller/product-seller-delete-success', 'ProductsSellerController@deleteSuccessForm');

$router->get('/text', 'UsersText@save');

$router->set404('Error404Controller@error404');

$router->get('/seller/sale', 'OrderSellerController@orderForm');

$router->before('GET|POST', '/.*', function () {


    @session_start();

    if (isset($_SESSION['user'])) {
        if (!str_contains($_SERVER['REQUEST_URI'], $_SESSION['user']->type) &&
            (
                str_contains($_SERVER['REQUEST_URI'], 'admin') ||
                str_contains($_SERVER['REQUEST_URI'], 'buyer') ||
                str_contains($_SERVER['REQUEST_URI'], 'seller'))) {
            die('403');
        }
    }

    /*  if ($_SESSION['user']->type != $type){

      }
  */
});

/*$router->before('GET|POST', '/seller/.*', function() {
    session_start();
    exit($_SESSION['user']->type);
    $type = 'seller';
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']->type != $type){
            header('location: /');
        }
    }
});
$router->before('GET|POST', '/buyer/.*', function() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: /');

    }
});
$router->before('GET|POST', '/admin/.*', function() {
    session_start();
    if (!isset($_SESSION['user'])) {
        header('location: /');

    }
});*/
// Run it!
$router->run();