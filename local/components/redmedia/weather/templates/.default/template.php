<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
// the minimum pattern displays only the weather on the first day of 10 days
$this->setFrameMode(true); ?>
<? if(count($arResult['WEATHER']) && count($arResult['WEATHER']['WEEK_TABLE'][0])):?>
    <div class="widget featured-gallery-widget">
        <div class="widget-inner">
            <h3 class="widget-title m-has-ico"><i class="widget-ico tp tp-cloud"></i>Сегодня в Мотоле</h3>
            <div class="widget-content">
                <table class="table table-striped weather-table">
                    <? foreach ($arResult['WEATHER']['WEEK_TABLE'][0]['ITEMS'] as $DT): ?>
                        <tr><td><?=implode("<br>", $DT[0])?></td><td title="<?=$DT[2]?>"><i class="<?=$DT[1]?>"></i></td></tr>
                    <? endforeach; ?>
                </table>
                <? if($arParams['OLL_PAGE']): ?><p class="show-all-btn"><a href="<?=$arParams['OLL_PAGE']?>">Открыть прогноз на 10 дней</a></p><? endif; ?>
            </div>
        </div>
    </div>
<? endif; ?>