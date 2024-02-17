<?php

namespace App\Http\Controllers;

use App\Models\UploaderModel;
use App\Models\UserModel;
use Core\Helpers\GeneralHelper;
use Core\Loader\ControllerLoader;
use Rakit\Validation\Validator;

class ProfileController extends ControllerLoader
{
    private UploaderModel $uploaderModel;
    private GeneralHelper $generalHelper;

    public function __construct()
    {
        @session_start();
        $this->userModel = new UserModel();
        $this->uploaderModel = new UploaderModel();
        $this->generalHelper = new GeneralHelper();
    }

    public function profileForm(string $passwordChange = null, string $success = null, string $successProfile = null, string $avatarError = null)
    {
        $doc = $this->generalHelper->lang('profile-doc');
        if ($_SESSION['user']->avatar != 'public/image/user.png') {
            $_SESSION['profile-have-icon']= $doc['profile-have-icon'];
        }
        if ($_SESSION['user']->type == 'buyer') {
            $menuLang = $this->generalHelper->lang('buyer-menu');
        } else {
            $menuLang = $this->generalHelper->lang('seller-menu');
        }
        $lang = $this->generalHelper->lang('profile-page');

        $type = $_SESSION['user']->type;
        echo $this->view()->make("panel/menus/menu-$type", ['menuLang' => $menuLang])->render();
        echo $this->view()->make('panel/profile', ['passwordChange' => $passwordChange,
            'lang' => $lang, 'successSetting' => $success,
            'successProfile' => $successProfile,
            'avatarError' => $avatarError])->render();
    }

    public function editProfile()
    {
        $id = $_SESSION['user']->id;
        unset($_SESSION['user']);
        $this->userModel->updateUser($id, $_POST);
        $user = $this->userModel->getUserById($id);
        if (empty($user->avatar)) {
            $user->avatar = 'public/image/user.png';
        }

        $_SESSION['user'] = $user;

        $doc = $this->generalHelper->lang('profile-doc');
        $_SESSION['profile-edit'] = $doc['profile-update'];
        header('Location: /profile-form?tab=profile_settings');
    }

    public function editPassword()
    {
        $user = $this->userModel->getUserById($_SESSION['user']->id);
        $doc = $this->generalHelper->lang('profile-doc');
        if ($_POST['old_password'] == $user->password) {
            unset($_POST['old_password']);
            $password = $_POST['password'];
            $this->userModel->updateUser($_SESSION['user']->id, ['password' => $password]);
            $_SESSION['profile-password-success'] = $doc['profile-password-success'];
            header('Location: /profile-form?tab=change_password_settings');

        } else {
            $_SESSION['profile-password-error'] = $doc['profile-password-error'];
            header('Location: /profile-form?tab=change_password_settings');
        }
    }

    public function upload()
    {

        $userId = $_SESSION['user']->id;

        $fileName = basename($_FILES["file"]["name"]);
        $doc = $this->generalHelper->lang('profile-doc');
        $targetDir = "public/uploads/profiles/" . $userId . '/';
        $allowTypes = ['png'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        if (!file_exists($targetDir . $fileType)) {
            mkdir($targetDir . $fileType, 0755, true);
        }

        $targetFilePath = $targetDir . "$fileType/" . $fileName;
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $statusMsg = "The file " . $fileName . " has been uploaded.";

                $data['avatar'] = $targetFilePath;
                $_SESSION['user']->avatar = $targetFilePath;
                $this->userModel->updateUser($userId, $data);
                $_SESSION['profile-icon-set'] = $doc['profile-icon-set'];
                header('Location: /profile-form?tab=upload_profile_id');
            }


        } else {
            $_SESSION['profile-icon-error'] = $doc['profile-icon-error'];
            header('Location: /profile-form?tab=upload_profile_id');
        }

    }

}