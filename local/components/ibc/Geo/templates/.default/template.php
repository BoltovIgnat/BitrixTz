<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<?
CJSCore::Init(array("jquery"));

//\Bitrix\Main\Diag\Debug::dump($arParams);
//\Bitrix\Main\Diag\Debug::dump($arResult);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"
        integrity="sha512-yVcJYuVlmaPrv3FRfBYGbXaurHsB2cGmyHr4Rf1cxAS+IOe/tCqxWY/EoBKLoDknY4oI1BNJ1lSU2dxxGo9WDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<form>
    <div class="form-group">
        <input type="search" id="ibc-input" class="form-control" placeholder="Поиск">
        <button type="submit" id="ibc-search" class="btn btn-primary">Найти</button>
    </div>
</form>
<div class="ibc-result">

</div>
