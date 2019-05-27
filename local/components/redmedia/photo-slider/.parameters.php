<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
  return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
  $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];


$arComponentParameters = array(
  "PARAMETERS" => array(
      "IBLOCK_TYPE" => array(
        "PARENT" => "BASE",
        "NAME" => "Тип инфоблока",
        "TYPE" => "LIST",
        "VALUES" => $arTypesEx,
        "DEFAULT" => "mediateka",
        "REFRESH" => "Y",
      ),
      "IBLOCK_ID" => array(
        "PARENT" => "BASE",
        "NAME" => "ID инфоблока",
        "TYPE" => "LIST",
        "VALUES" => $arIBlocks,
        "DEFAULT" => "17",
        "ADDITIONAL_VALUES" => "Y",
        "REFRESH" => "Y",
      ),
      "COUNT" => array(
       "NAME" => "Колличество новостей",
       "TYPE" => "STRING",
      ),
      "LINK_BLOCK" => array(
          "NAME" => "Ссылка с блока",
          "TYPE" => "STRING",
      ),
      "NAME_BLOCK" => array(
          "NAME" => "Имя ссылки с блока",
          "TYPE" => "STRING",
      ),

    'CACHE_TIME'  =>  array('DEFAULT'=>86400), 
  )
);

?>