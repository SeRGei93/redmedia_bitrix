<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/* тут необходимо первоначальные параметры, задающие параметры текущего города */
$URL_PARSER_ARR = [
    'motol'=>'https://yandex.by/pogoda/details?lat=52.31270599&lon=25.59757233',
];

$arComponentParameters = array(
    "PARAMETERS" => array(
        "URL_PARSER_PAGE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("URL_PARSER_PAGE"),
            "TYPE" => "LIST",
            "VALUES" => array_flip($URL_PARSER_ARR),
            "MULTIPLE" => 'N'
        ),
        "OLL_PAGE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("OLL_PAGE"),
            "TYPE" => "STRING",
            "DEFAULT" => "/weather/",
        ),
        "CACHE_TIME"  =>  Array("DEFAULT"=>3600),
    ),
);
