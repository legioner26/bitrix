<?
use Bitrix\Main\Localization\Loc;
/** @global CMain $APPLICATION */
Loc::loadMessages(__FILE__);

if (!check_bitrix_sessid()) {
    return;
}
?>
<form action="<?echo $APPLICATION->GetCurPage()?>">
    <?=bitrix_sessid_post()?>
    <input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
    <input type="hidden" name="id" value="legion.city">
    <input type="hidden" name="uninstall" value="Y">
    <input type="hidden" name="step" value="2">
    <?echo CAdminMessage::ShowMessage(GetMessage("MOD_UNINST_WARN"))?>
    <p><?echo Loc::getMessage("LEGIONER_TEST_MOD_UNINST_SAVE")?></p>
    <p><input type="checkbox" name="savedata" id="savedata" value="Y" checked><label for="savedata"><?echo GetMessage("MOD_UNINST_SAVE_TABLES")?></label></p>
    <input type="submit" name="inst" value="<?echo Loc::getMessage("LEGIONER_TEST_MOD_UNINST_DEL")?>">
</form>