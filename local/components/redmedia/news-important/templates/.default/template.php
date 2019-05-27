<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<div class="c-slider" data-autoplay="8">
    <div class="slide-list">
        <?foreach($arResult as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
            <?$renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 1200, "height" => 500), BX_RESIZE_IMAGE_EXACT, false);?>
            <div class="slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>" style="background-image: url( '<?=$renderImage["src"]?>' );">
                <div class="slide-inner">

                    <div class="slide-content valign-bottom">
                        <div class="mask"></div>
                        <div class="row">
                            <div class="col-md-6 <?if($arItem["PROPERTY_TEXT_VALUE"] != 'Y'){echo 'col-md-push-6';}?>">
                                <h2><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h2>
                                <?if(!empty($arItem["PREVIEW_TEXT"])){?>
                                    <h3><?echo TruncateText($arItem["PREVIEW_TEXT"], 200)?></h3>
                                <?}?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?endforeach;?>
    </div>
</div>