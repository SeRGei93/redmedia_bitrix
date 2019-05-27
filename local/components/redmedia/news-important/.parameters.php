<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
  return;

$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
  $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];


$arProperties = array();
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"]));
while ($prop_fields = $properties->GetNext())
{
    $arProperties[$prop_fields['ID']] = $prop_fields["CODE"]." - ".$prop_fields['NAME'];
}



$arComponentParameters = array(
  "PARAMETERS" => array(
      "IBLOCK_TYPE" => array(
        "PARENT" => "BASE",
        "NAME" => "Тип инфоблока",
        "TYPE" => "LIST",
        "VALUES" => $arTypesEx,
        "DEFAULT" => "newsru",
        "REFRESH" => "Y",
      ),
      "IBLOCK_ID" => array(
        "PARENT" => "BASE",
        "NAME" => "ID инфоблока",
        "TYPE" => "LIST",
        "VALUES" => $arIBlocks,
        "DEFAULT" => "16",
        "ADDITIONAL_VALUES" => "Y",
        "REFRESH" => "Y",
      ),
      "IBLOCKS_PROP" => array(
          "PARENT" => "BASE",
          "NAME" => "С каким свойством показывать (типа чекбокс)",
          "TYPE" => "LIST",
          "VALUES" => $arProperties,
          "REFRESH" => "Y",
      ),

      "COUNT" => array(
       "NAME" => "Колличество новостей", 
       "TYPE" => "STRING",
      ),
      "ACTIVE_DATE_FORMAT" => CIBlockParameters::GetDateFormat("Формат показа даты", "ADDITIONAL_SETTINGS"),
      "CACHE_TIME"  =>  array("DEFAULT"=>36000000),
      "CACHE_GROUPS" => array(
          "PARENT" => "CACHE_SETTINGS",
          "NAME" => "Учитывать права доступа",
          "TYPE" => "CHECKBOX",
          "DEFAULT" => "Y",
      ),
  )
);

?>