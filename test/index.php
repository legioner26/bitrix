<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Реализация тестового задания(модуль+компонент).");
$APPLICATION->SetTitle("Тестовое");?>

<?$APPLICATION->IncludeComponent(
    "bitrix:emptycomponent",
    "",
    array(),
    false
);?>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
