<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true)die();
use \Bitrix\Main,
    \Bitrix\Main\Loader,
    \Legion\City\CityTable,
    \Bitrix\Main\Localization\loc;
class EmptyComponent extends \CBitrixComponent
{
    public function checkModules()
    {
        if(!Loader::includeModule('legion.city')) {
            throw new Main\LoaderException(Loc::getMessage('AP_CITY_MODULE_NOT_INSTALLED'));
        } else {
            return true;
        }
    }
    public function executeComponent() 
    {
        try {
            $this->includeComponentLang('class.php');
            if ($this->checkModules()) {
                $result = CityTable::getList();
                $this->arResult = $result->fetchAll();
            }
            $this->includeComponentTemplate();
        } catch(\Exception $e) {
            ShowError($e->getMessage());
            return false;
        }
    }
}