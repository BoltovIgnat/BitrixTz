<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
$arResult = [];


if (CModule::IncludeModule('highloadblock')) {
    $arHLBlock = Bitrix\Highloadblock\HighloadBlockTable::getById(2)->fetch();
    $obEntity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($arHLBlock);
    $strEntityDataClass = $obEntity->getDataClass();

    $resData = $strEntityDataClass::getList(array(
        'select' => array('UF_SITY'),
        'filter' => array('UF_IPADRESS' => $_POST['ipadress'])
    ));
    $countRow = $resData->getSelectedRowsCount();

    if ($countRow > 0){
        $arItem = $resData->Fetch();
        echo json_encode($arItem);
    }
    else{
        echo 'Информации по данному ип адрессу нету';
    }
}


