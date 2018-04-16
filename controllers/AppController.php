<?php
# відповідальність цього класу
# у визначені контролера і дії
# після того як FrontController розібрав запит



namespace App;

class AppController
{
    protected static $router;

    public static $db;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run ($uri) {

        self::$router = new FrontController($uri);

        self::$db = new DBController(Config::getSettings('DB_HOST'), Config::getSettings('DB_USER'), Config::getSettings('DB_PASS'), Config::getSettings('DB_NAME'));

        LangController::load(self::$router->getLanguage());

        # відправляємо $uri у FrontController, той розбирає її
        # і повертає готові назви для контроллерів методів і параметрів
        # $controller_class приймає на себе імя контроллера
        $controller_class = __NAMESPACE__.DS.ucfirst(self::$router->getController()).'Controller';

        # $controller_method приймає на себе імя методу
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());

        # створюємо новий обєкт класу контроллера
        $controller_object = new $controller_class();

        # перевіряємо чи такий метод існує в контроллері
        if (method_exists($controller_object, $controller_method)) {
            $result = $controller_object -> $controller_method();

            # якщо шаблон не співпадає з імям методу
            # тоді значення яке повертає метод контролеру записуємо у $view_path
            # у такому випадку ми будемо використовувати його як шлях до шаблону
            $view_path = $controller_object->$controller_method();

            # якщо значення не повертається методом то шлях до шаблону
            # буде визначений самим обєктом
            # $view_object = new ViewController($controller_object->getData(), $view_path);
            $view_object = new ViewController($controller_object->getData(), $view_path);

            # контент для основого шаблону
            $content = $view_object->render();
        } else {
            throw new \Exception('Method '.$controller_method.' of class '.$controller_class.' does not exist');
        }

        # сам рендерінг
        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH.DS.$layout.'.php';
        # compact шукає на сторінці масив з ключом content
        # і пихає туди всі значення
        $layout_view_object = new ViewController(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }
}