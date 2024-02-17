<?php

namespace Core\Helpers;
use App\Models\SettingModel;
class GeneralHelper
{
    private SettingModel $settingModel;
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->settingModel = new SettingModel();
    }


    /**
     * @param string $langName
     * @return mixed|void
     */
    public function lang(string $langName)
    {
     //set fa or en
        $settingTar = $this->settingModel->getSetting();
        $setting= $settingTar['0'];
        if (is_object($setting)) {
            $setting = get_object_vars($setting);
        }
        $_SESSION['general'] = $setting['lang'];
        $general = $_SESSION['general'];
        $file = "views/lang/$general/$langName.php";
        if (file_exists($file)) {
            $config = include $file;
            return $config;
        }
    }

}