<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?>
<?php
$APPLICATION->IncludeComponent(
    "ibc:Geo",
    ".default",
    Array()
    );
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>