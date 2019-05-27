<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();
$isIndex = ($APPLICATION->GetCurPage(false) == SITE_DIR);

$news = (CSite::InDir('/news/')); // условие для страницы

$whitebg = $APPLICATION->GetDirProperty("whitebg") == 'Y'; // условие из админки (используем модуль Утилиты от «Webdebug»)

$assets = \Bitrix\Main\Page\Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?
    $APPLICATION->ShowCSS(true);
    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowHeadScripts();

    $assets->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap-grid/bootstrap4-grid.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/css/main.css');
    $assets->addCss(SITE_TEMPLATE_PATH . '/css/custom.css');

    $assets->addJs(SITE_TEMPLATE_PATH . '/libs/jquery/jquery.min.js');
    $assets->addJs(SITE_TEMPLATE_PATH . '/js/main.js');

    //STRING
    $assets->addString("<meta name='viewport' content='width=device-width, initial-scale=1'>");
    $assets->addString("<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>");
    $assets->addString("<link rel='shortcut icon' href='/img/favicon/favicon.ico' />");
    $assets->addString("<link rel='apple-touch-icon' href='/img/favicon/apple-icon.png'>");
    $assets->addString("<link rel='apple-touch-icon' sizes='72x72' href='/img/favicon/apple-icon-72x72.png' />");
    $assets->addString("<link rel='apple-touch-icon' sizes='114x114' href='/img/favicon/apple-icon-114x114.png' />");

    $assets->addString("<meta name='theme-color' content='#ec5237'>");
	$assets->addString("<meta name='msapplication-navbutton-color' content='#ec5237'>");
	$assets->addString("<meta name='apple-mobile-web-app-status-bar-style' content='#ec5237'>");

    $APPLICATION->ShowMeta("robots", false);
    $APPLICATION->ShowMeta("keywords", false);
    $APPLICATION->ShowMeta("description", false);
    $APPLICATION->ShowLink("canonical", null);

    ?>


</head>

<body>
    <? $APPLICATION->ShowPanel(); ?>
    
