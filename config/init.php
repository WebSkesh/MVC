<?php
# завантажує всі налаштування в одному місці

use App\LangController;

require_once ROOT.DS."vendor".DS."autoload.php";
require_once ROOT.DS."config".DS."config.php";


# доступ до мовних масивів
function __($key, $default_value = '') {
    return LangController::getLang($key, $default_value);
}


function arr_echo ($arr) {
    echo "<pre>";
    print_r ($arr);
    echo "</pre><p>";
}