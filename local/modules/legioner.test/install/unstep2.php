<?
/** @global CMain $APPLICATION */
use Bitrix\Main\Localization\Loc;
if (!check_bitrix_sessid())
    return;
Loc::loadMessages(__FILE__);
if ($ex = $APPLICATION->GetException())
    echo CAdminMessage::ShowMessage(array(
        "TYPE" => "ERROR",
        "MESSAGE" => GetMessage("MOD_UNINST_ERR"),
        "DETAILS" => $ex->GetString(),
        "HTML" => true,
    ));
else
    echo CAdminMessage::ShowNote(Loc::getMessage("LEGIONER_TEST_MOD_UNINST_OK"));
?>
<form action="<?echo $APPLICATION->GetCurPage(); ?>">
    <input type="hidden" name="lang" value="<?echo LANG ?>">
    <input type="submit" name="" value="<?echo Loc::getMessage("LEGIONER_TEST_MOD_BACK"); ?>">
    <form>
