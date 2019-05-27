<?php
// отладка (только для админов)
function dump($a){
    global $USER;
    if($USER->IsAdmin()){
        echo '<pre>';
        print_r($a);
        echo '</pre>';
    }
}