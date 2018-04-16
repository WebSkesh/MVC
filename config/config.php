<?php

use App\Config;

Config::setSettings('SITE_NAME', 'MVC');

Config::setSettings('LANGUAGES', array('ukr', 'en', 'ru'));

Config::setSettings('ROUTES', array(
    'default' => '',
    'admin' => 'admin_',
));


Config::setSettings('DEFAULT_ROUTE', 'default');
Config::setSettings('DEFAULT_LANGUAGE', 'ukr');
Config::setSettings('DEFAULT_CONTROLLER', 'pages');
Config::setSettings('DEFAULT_ACTION', 'index');


Config::setSettings('DB_HOST', 'localhost');
Config::setSettings('DB_USER', 'root');
Config::setSettings('DB_PASS', '');
Config::setSettings('DB_NAME', 'mvc');