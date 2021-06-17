<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
$arResult = [];


if (CModule::IncludeModule('highloadblock')) {
    $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();
    $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();

    $data = array(
        "UF_SITY"=>$_POST['sity'],
        "UF_IPADRESS"=>$_POST['ipadress'],
    );

    $result = $strEntityDataClass::add($data);

}
