<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true); ?>

<? if(count($arResult['WEATHER']) && count($arResult['WEATHER']['WEEK_TABLE'])):?>
    <div class="table-responsive">
    <table class="table table-striped weather-10">
    <? foreach ($arResult['WEATHER']['WEEK_TABLE'] as $DT): ?>
        <tr class="weather-table-header">
            <td colspan="3"><?=$DT['DAY']?></td>
            <? foreach ($arResult['WEATHER']['HEADER_TABLE'] as $header){ ?>
                <td><?=$header?></td>
            <? } ?>
        </tr>
        <? foreach ($DT['ITEMS'] as $DT): ?>
            <tr>
                <? foreach ($DT as $w=>$item){ ?>
                    <? if($w==1){ ?>
                        <td><i class="<?=$item?>"></i></td>
                    <? }else{ ?>
                        <td><?=is_array($item)?implode("<br>",$item):$item?></td>
                    <? } ?>
                <? } ?>
            </tr>
        <? endforeach; ?>
    <? endforeach; ?>
    </table>
    </div>
<? endif; ?>