<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
    "NAME" => GetMessage("NAME"),
    "DESCRIPTION" => GetMessage("DESCR"),
    "VERSION" => "1.00",
    "PATH" => array("ID" => "redmedia",
        "NAME" => GetMessage("GROUP_NAME"),
        "CHILD" => array("ID" => "photo",
            "NAME" => GetMessage("SYSTEM_GROUP_NAME"),
        ),
    ),
);

?>
