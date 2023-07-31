<?php

use Bitrix\Main\Localization\Loc;
/** @global CMain $APPLICATION */
Loc::loadMessages(__FILE__);

if (!check_bitrix_sessid()) {
    return;
}
if ($errorException = $APPLICATION->GetException()) {

    echo(CAdminMessage::ShowMessage($errorException->GetString()));
} else {
    echo(CAdminMessage::ShowNote(Loc::getMessage("LEGIONER_TEST_STEP_BEFORE") . " " . Loc::getMessage("LEGIONER_TEST_STEP_AFTER")));
}
?>

<form action="<?=$APPLICATION->GetCurPage()?>">
    <input type="hidden" name="lang" value="<?=LANG?>"/>
    <input type="submit" value="<?=Loc::getMessage("LEGIONER_TEST_STEP_SUBMIT_BACK")?>">
</form>