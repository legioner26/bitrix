<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Реализация тестового задания(модуль+компонент).");
$APPLICATION->SetPageProperty("description", "Реализация тестового задания(модуль+компонент).");
$APPLICATION->SetTitle("Тестовое");?><?$APPLICATION->IncludeComponent(
	"bitrix:emptycomponent",
	"",
Array()
);?><? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>