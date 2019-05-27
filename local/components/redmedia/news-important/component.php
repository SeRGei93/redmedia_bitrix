<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();

if($this->startResultCache(false, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))
{
    try {
        \Bitrix\Main\Loader::includeModule('iblock');
    } catch (\Bitrix\Main\LoaderException $exception) {
        AddMessage2Log($exception->getMessage(), 'gpk:news-important');
        ShowError('Errors on Loader IBlock module');
        return;
    }

    $arSelect = array(
        'IBLOCK_ID',
        'ID',
        'NAME',
        'PREVIEW_TEXT',
        'PREVIEW_PICTURE',
        'DATE_ACTIVE_FROM',
        'DETAIL_PAGE_URL',
        'PROPERTY_TEXT'
    );

    $arFilter = array(
        'IBLOCK_ID'=> $arParams['IBLOCK_ID'],
        "PROPERTY_".$arParams['IBLOCKS_PROP'] => "Y",
        "ACTIVE" => "Y",
        "ACTIVE_DATE" => "Y",
    );

    $arSort = array("ACTIVE_FROM"=>"DESC");

    $res =  CIBlockElement::GetList(
        $arSort,
        $arFilter,
        false,
        Array( 'nTopCount' => $arParams['COUNT']),
        $arSelect
    );

    while ($arFields = $res->GetNext()) {

        $arButtons = CIBlock::GetPanelButtons(
            $arFields["IBLOCK_ID"],
            $arFields["ID"],
            0,
            array("SECTION_BUTTONS"=>false, "SESSID"=>false)
        );
        $arFields["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arFields["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

        if (strlen($arFields['ACTIVE_FROM']) > 0) {
            $arFields['DISPLAY_ACTIVE_FROM'] = CIBlockFormatProperties::DateFormat(
                $arParams['ACTIVE_DATE_FORMAT'],
                MakeTimeStamp(
                    $arFields['ACTIVE_FROM'],
                    CSite::GetDateFormat()
                )
            );
        } else {
            $arFields['DISPLAY_ACTIVE_FROM'] = '';
        }

        $arResult[] = $arFields;
    }

    $this->SetResultCacheKeys($arSelect);

    $this->IncludeComponentTemplate();
}
?>