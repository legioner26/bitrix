<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<?php if(!empty($arResult)) { ?>
<section>
    <table>
        <tr>
            <th><?=GetMessage('CT_BNL_CITY_NAME')?></th>
            <th><?=GetMessage('CT_BNL_CITY_PROFIT')?></th>
            <th><?=GetMessage('CT_BNL_CITY_EXPENSES')?></th>
            <th><?=GetMessage('CT_BNL_CITY_COUNT')?></th>
            <th><?=GetMessage('CT_BNL_RATING_CITY_COUNT')?></th>
            <th><?=GetMessage('CT_BNL_RATING_CITY_PROFIT')?></th>
            <th><?=GetMessage('CT_BNL_RATING_CITY_EXPENSES')?></th>
        </tr>
    <?foreach($arResult as $key => $arItem) { ?>
        <tr>
            <td><?=$arItem['CITY_NAME']?></td>
            <td><?=$arItem['CITY_PROFIT']?></td>
            <td><?=$arItem['CITY_EXPENSES']?></td>
            <td><?=$arItem['CITY_COUNT']?></td>
            <td><?=rand(1,5)?></td>
            <td><?=rand(6,10)?></td>
            <td><?=rand(10,20)?></td>
        </tr>
    <? } ?>
    </table>
</section>
<? } ?>