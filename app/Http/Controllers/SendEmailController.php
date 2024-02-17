<?php

namespace App\Http\Controllers;

use App\Models\UploaderModel;
use Core\Loader\ControllerLoader;

class SendEmailController extends ControllerLoader
{
    private UploaderModel $uploaderModel;

    public function sendEmail()
    {
        $to = "amir.dehghani.developer@gmail.com";
        $subject = "This is a test";
        $message = "This is a PHP plain text email example.";
            mail($to, $subject, $message);

    }
}