<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>




<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="mb6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	    <div class="h5 mb24"><?=$arItem["NAME"]?></div>
	    <div class="row">
	        
	        	<?
			

				    $lica = getIblockElementCom($arItem["PROPERTIES"]["LICA"]["LINK_IBLOCK_ID"],($arItem["PROPERTIES"]["LICA"]["VALUE"]) ? $arItem["PROPERTIES"]["LICA"]["VALUE"] : array());
				    
				?>
        		<?foreach($lica as $key=>$lico):?>
        		<div class="col-lg-6 col-12 mb30">
		            <a href="/mezhdunarodnaya-deyatelnost/biznes-posly/<?=$lico["FILDS"]["CODE"];?>/" class="card card-16 bg-base3 brd6 card-man card-man-posol h100">

		                <div class="card-man-img">
		                    <img src="<?=$lico["FILDS"]["DETAIL_PICTURE"] ?? '';?>" alt="<?=$lico["FILDS"]["NAME"] ?? '';?>">
		                </div>
		                <div class="card-man-content">
		                    <div class="h5 mb5"><?=$lico["FILDS"]["NAME"] ?? '';?></div>
		                    <div class="card-man-region body-s">
		                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>">
		                        <span><?=$arItem["NAME"]?></span>
		                    </div>
		                </div>
		            </a>
	            </div>
	            <?endforeach;?>
	        
	    </div>
	</div>

<?endforeach;?>
