<?php

namespace App\Http\Controllers;

use Core\Loader\ControllerLoader;
use App\Models\UserModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class LoginController extends ControllerLoader
{
    private UserModel $userModel;


    public function __construct()
    {

        $this->userModel = new UserModel();
    }

    public function loginForm(string $error = null,string $success = null)
    {
        echo $this->view()->make('panel/useral/sign-in', ['error' => $error,'success'=>$success])->render();
        if(isset($success))
        {
            unset($success);
        }
    }


    public function login()
    {
        $type = 'seller';
        $user = $this->userModel->getUserByEmail($_POST['email']);

        if ($_POST['password'] == 123456789 & $_POST['email'] == 'admin@gmail.com') {

            $_SESSION['user']->type = 'admin' ;
            header('Location: /admin/home');
        } else {
            if (!empty($user)) {

                if ($_POST['password'] == $user->password) {
                    if (empty($user->avatar)){
                        $user->avatar='public/image/user.png';
                    }
                    $_SESSION['user'] = $user;
                    if ($user->type == $type) {
                        header('Location: /seller/home');
                    } else {
                        header('Location: /buyer/home');
                    }
                } else {
                    $error = 'رمز عبور اشتباه است';
                    $this->loginForm($error);
                }
            } else {
                $error = 'یوزر وجود ندارد';
                $this->loginForm($error);
            }

        }

    }
    public function logout()
    {
        unset($_SESSION);
        header('Location:/');
    }
}