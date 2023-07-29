<?php

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Loader;

/**
 * Возвращает ID инфоблока по его коду
 *
 * @param string $code - код ИБ
 *
 * @return int - ID найденного ИБ
 * @throws Exception
 */
function getIblockIdByCode(string $code): int
{
    Loader::includeModule('iblock');

    $iblock = IblockTable::getList([
        'filter' => [
            'CODE' => $code,
        ],
        'select' => [
            'ID',
            'CODE',
        ],
    ])->fetch();

    if (!isset($iblock['ID'])) {
        throw new Exception("Не найден инфоблок с кодом {$code}");
    }

    return (int) $iblock['ID'];
}
function getIblockElementCom(string $idBlock, array $idElement)
{
  //  echo '<pre>'; print_r($idElement); die('</pre>') ;
    if (!empty($idElement[0]) && is_array($idElement)) {
        Loader::includeModule('iblock');
        $rsResult = CIBlockElement::GetList(array("SORT" => "ASC"), ['IBLOCK_ID' => $idBlock, 'ID' => $idElement]);

        $arResult = [];
        while ($ob = $rsResult->GetNextElement()) {
            $arFields = $ob->GetFields();
            $arProps = $ob->GetProperties();
            $arFields['DETAIL_PICTURE'] = CFile::GetPath($arFields['DETAIL_PICTURE']);
            $arFields['PREVIEW_PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
            $arResult[] = array(
                'FILDS' => $arFields,
                'PROPERTIES' => $arProps
            );
        }

        return $arResult;
    } else {
      
        return array();

    }

}
function getIblockSectionCom(string $idBlock, array $idSection, $arSelect=false, $UF)
{

    if (!empty($idSection[0]) && is_array($idSection)) {
        Loader::includeModule('iblock');
        $rsResult = CIBlockSection::GetList(array("SORT" => "ASC"), ['IBLOCK_ID' => $idBlock, 'ID' => $idSection],$arSelect,$UF);
        $arResult = [];
        while ($ob = $rsResult->GetNext()) {
            $ob['DETAIL_PICTURE'] = CFile::GetPath($ob['DETAIL_PICTURE']);
            $ob['PICTURE'] = CFile::GetPath($ob['PICTURE']);
            $arResult[] = $ob;
         }

        return $arResult;
    } else {

        return array();

    }

}
function getTypeFile(string $filename)
{
    return array_pop(explode(".", $filename));
}
//пример
// $sopredResult = getIblockElementCom($arResult["PROPERTIES"]["DIRECTOR"]["LINK_IBLOCK_ID"],($arResult["PROPERTIES"]["SOPRED"]["VALUE"]) ? $arResult["PROPERTIES"]["SOPRED"]["VALUE"] : array());
