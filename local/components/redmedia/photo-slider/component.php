<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();


if ($this->StartResultCache())
{
    \Bitrix\Main\Loader::includeModule('iblock');


    $arSort= Array("ACTIVE_FROM"=>"ASC");

    $arSelect = Array('ID', 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL');

    $arFilter = Array("IBLOCK_ID"=> $arParams['IBLOCK_ID']);

    $res =  CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);

    while($ar_fields = $res->GetNext()):

        $arResult[]=$ar_fields;

    endwhile;

    $this->SetResultCacheKeys(array(
        'ID',
        'NAME',
        'PREVIEW_PICTURE',
        'DETAIL_PAGE_URL',
    ));

    $this->IncludeComponentTemplate();
}
?>