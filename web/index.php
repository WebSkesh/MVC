<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');
define('BASE', 'http://localhost/MVC/');

require_once ROOT.DS."config".DS."init.php";

use App\AppController;
use App\FrontController;

AppController::run($_SERVER['REQUEST_URI']); # передаємо посилання на обробку

$test = AppController::$db->query('SELECT * FROM pages');
# arr_echo($test);


$router = new FrontController($_SERVER['REQUEST_URI']);

echo '<pre>';
echo "Route: ".$router->getRoute()."<br />";
echo "Language: ".$router->getLanguage()."<br />";
echo "Controller: ".$router->getController()."<br />";
echo "Action: ".$router->getMethodPrefix().$router->getAction()."<br />";
echo "Params: ";
print_r($router->getParams());
echo '</pre>';


