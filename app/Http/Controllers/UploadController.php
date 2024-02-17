<?php

namespace App\Http\Controllers;

use App\Models\UploaderModel;
use Core\Loader\ControllerLoader;
use App\Models\UserModel;

class UploadController extends ControllerLoader
{
    private UploaderModel $uploaderModel;


    public function __construct()
    {
        session_start();
        $this->uploaderModel = new UploaderModel();
    }

    public function uploadForm(string $error = null)
    {
        echo $this->view()->make('panel/upload-form', ['error' => $error])->render();
    }

    public function upload()
    {

        $userId = 24;
        $fileName = time() . '_' . $userId;


        $targetDir = "public/uploads/" . $userId . '/';
        $realFileName = basename($_FILES["file"]["name"]);
        $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'pdf'];
        $targetFilePath = $targetDir . $realFileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
        $fileName .= '.' . $fileType;
        if (!file_exists($targetDir . $fileType)) {
            mkdir($targetDir . $fileType, 0755, true);
        }

        $targetFilePath = $targetDir . "$fileType/" . $fileName;
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                $statusMsg = "The file " . $fileName . " has been uploaded.";
                echo $statusMsg;

                $userFileData = [
                    'path' => $targetFilePath,
                    'real_name' => $realFileName,
                    'name' => $fileName,
                    'user_id' => $userId,
                    'mime_type' => $fileType
                ];

                $this->uploaderModel->save($userFileData);
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
                echo $statusMsg;
            }
        } else {
            echo '<pre>';
            print_r($_SERVER);
        }

    }

    public function getUserFiles()
    {

        $userId = 24;
        $userFiles = $this->uploaderModel->getUserFiles($userId);

        echo $this->view()->make('panel/user-files', ['userFiles' => $userFiles])->render();

    }

    public function deleteUserFile(int $fileId)
    {
        $userId = 24;
        $useFile = $this->uploaderModel->getUserFileById($userId, $fileId);
        if (!isset($useFile->user_id)) {
            // display access error (403) you can make a view for show this error
            // please make a directory named "errors " in views path of root and put errors there
            die('not found');

        } else {

              $this->uploaderModel->deleteUserFile($userId,$fileId);
              if(file_exists($useFile->path)) {
                  unlink($useFile->path);
              }
              echo 'file has been deleted';

        }
    }

}