<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Core\Loader\ControllerLoader;

class ForgotPasswordController extends ControllerLoader
{
    private UserModel $userModel;


    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new UserModel();
    }

    public function forgotPasswordForm(string $doc =null)
    {
        echo $this->view()->make('/panel/forgot-password',['doc'=>$doc])->render();
    }

    public function check()
    {
        $user = $this->userModel->getUserByEmail($_POST['email']);
        $_SESSION['reset']=$user;
        if (!empty($user)){
            $key = $user->forget_key;
            if ($key == $_POST['key']) {
                header('Location: /reset-password-form');
            }
            else {
                $doc = 'the key is wrong';
                $this->forgotPasswordForm($doc);
            }
        }
        else {
            $doc = 'the user not found';
            $this->forgotPasswordForm($doc);
            unset($doc);
        }

    }
    public function resetPasswordForm()
    {
        echo $this->view()->make('/panel/reset-password')->render();
    }
    public function resetPassword()
    {
        if ($_POST['password']==$_POST['confirm']){
            unset($_POST['confirm']);
         $user=$_SESSION['reset'];
         $userId=$user->id;
            $this->userModel->updateUser($userId,$_POST);
            header('Location: /');
        }
    }
}