<?php

use \Bitrix\Main\ModuleManager,
    \Bitrix\Main\Localization\Loc,
    \Bitrix\Main\Config as Conf,
    \Bitrix\Main\Config\Option,
    \Bitrix\Main\EventManager,
    \Bitrix\Main\Entity\Base,
    \Bitrix\Main\Application,
    \Bitrix\Main\Loader;

Loc::loadMessages(__FILE__);
if (class_exists('legioner_test'))
    return;

/**
 * @ Class legioner_test
 */
class legioner_test extends \CModule
{
 //   public $exclusionAdminAdminFiles;

    /**
     * dssl_form constructor.
     */
    function __construct()
    {
        $arModuleVersion = array();
        include __DIR__ . '/version.php';
       /* $this->exclusionAdminAdminFiles = array(
            '..',
            '.',
            'menu.php',
            'operation_description.php',
            'task_description.php',
        );*/
        $this->MODULE_ID = 'legioner.test';
        $this->MODULE_NAME = Loc::getMessage("LEGIONER_TEST_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("LEGIONER_TEST_MODULE_DESCRIPTION");
        $this->PARTNER_NAME = Loc::getMessage("LEGIONER_TEST_PARTNER_NAME");
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];

        $this->MODULE_SORT = 1;
        $this->SHOW_SUPER_ADMIN_GROUP_RIGHTS = 'Y';
        $this->MODULE_GROUP_RIGHTS = 'Y';

    }

//Размещаем модуль
    public function GetPath($notDocumentRoot = false)
    {
        if ($notDocumentRoot) {
            return str_ireplace(Application::getDocumentRoot(),'',dirname(__DIR__));
        } else {
            return dirname(__DIR__);
        }
    }

//Проверка версии D7
    public function isVersionD7()
    {
        return CheckVersion(ModuleManager::getVersion("main"), "14.00.00");
    }

    //Установка модуля
    public function DoInstall()
    {
        global $APPLICATION;
        if ($this->isVersionD7()) {
            $this->InstallDB();
            $this->InstallEvents();
         //   $this->InstallFiles();
            ModuleManager::registerModule($this->MODULE_ID);
        } else {
            $APPLICATION->ThrowException(Loc::getMessage("LEGIONER_TEST_ERROR_D7"));
        }
        $APPLICATION->IncludeAdminFile(
            Loc::getMessage("LEGIONER_TEST_INSTALL_TITLE"),
            $this->GetPath() . "/install/step.php"
        );
    }

//Удаление модуля
    public function DoUninstall()
    {
        global $APPLICATION;
        $context = Application::getInstance()->getContext();
        $request = $context->getRequest();
        if ($request['step'] < 2) {
            $APPLICATION->IncludeAdminFile(Loc::getMessage("LEGIONER_TEST_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep1.php");
        } elseif ($request['step'] == 2) {
          //  $this->UnInstallFiles();
            $this->UnInstallEvents();
            if ($request['savedata'] != 'Y') {
                $this->UnInstallDB();
            }

            ModuleManager::unRegisterModule($this->MODULE_ID);
            $APPLICATION->IncludeAdminFile(Loc::getMessage("LEGIONER_TEST_UNINSTALL_TITLE"), $this->GetPath() . "/install/unstep2.php");
        }

    }
}