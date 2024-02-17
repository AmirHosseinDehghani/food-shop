<?php

namespace App\Http\Controllers;

use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use App\Models\UserModel;
use App\Http\Controllers\LoginController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class SignupController extends ControllerLoader
{
    private UserModel $userModel;
    private LoginController $loginController;


    public function __construct()
    {

        $this->userModel = new UserModel();
        $this->loginController = new LoginController();
    }

    public function signupForm()
    {
        echo $this->view()->make('panel/useral/sign-up')->render();
    }

    public function signup()
    {
        if ($_POST['password'] == $_POST['confirm']) {

            $str = rand();
            $result = md5($str);
            echo $result;
            $_SESSION['cod'] = $result;
            unset($_POST['confirm']);
            $_SESSION['data'] = $_POST;
            $email = $_POST['email'];
            $name =$_POST['name'];
            $msg =  $_SESSION['cod'];
            $msg = wordwrap($msg,70);
          @  mail("$email","My subject",$msg);


        }

            $this->verifyForm();

    }

    public function verifyForm()
    {
        echo $this->view()->make('panel/useral/check')->render();
    }

    public function verify()
    {
        if ($_POST['verify'] == $_SESSION['cod']) {
            try {
                $data = $_SESSION['data'];
                $this->userModel->save($data);
                $name = $data['name'];
                $success = "یوزر $name ساخته شد";
                $this->loginController->loginForm($success);
            } catch (\Exception $exception) {
                $this->loginController->loginForm();
            }
        }
    }
}