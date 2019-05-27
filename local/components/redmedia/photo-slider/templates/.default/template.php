<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<section class="photo_gallery">
    <div class="photo_wrap">
        <div class="owl-carousel owl-theme photo_slider">
            <?foreach($arResult as $arItem):?>
                <figure class="photo_slider_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <?
                    $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 450, "height" => 300), BX_RESIZE_IMAGE_EXACT, false);
                    echo '<img src="'.$renderImage["src"].'"  alt="'.$arItem["NAME"].'" title="'.$arItem["NAME"].'" />';
                    ?>
                    <span class="mask"></span>
                    <figcaption>
                        <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>">
                            <span><?echo $arItem["NAME"]?></span>
                        </a>
                    </figcaption>
                </figure>
            <?endforeach;?>
        </div>
    </div>
</section>
