<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

\Bitrix\Main\Mail\Event::send(array(

    "EVENT_NAME" => "ERROR_INFO",

    "LID" => "s1",

    "C_FIELDS" => array(

        "EMAIL" => "uncelpeter@gmail.com",

        "USER_ID" => 'error'

    ),

));