<?php
# відповідаю за роботу з вьюхами (представленнями)

namespace App;


class ViewController
{
    protected $data;

    protected $path;


    public function __construct($data= array(), $path = null) {
        if (!$path) {
            $path = self::getDefaultViewPath();
        }

        if (!file_exists($path)) {
            throw new \Exception('File not found '.$path);
        }

        $this->path = $path;
        $this->data = $data;
    }

    # оприділяємо шлях до шаблону
    public static function getDefaultViewPath () {
        $router = AppController::getRouter();

        if (!$router) {
            throw new \Exception('There are problems with access to getRouter() method.');
        }

        # назва шаблону буде така ж як і назва методу
        # і буде починатись з префіксу методу
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.php';

        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    # відповідає за рендер шаблону
    # і повернення готового HTML коду
    public function render () {
        $data=$this->data;

        # включаємо буферизацію
        # тепер весь наш HTML код буде там
        ob_start();
        include ($this->path);

        # отримуємо HTML код
        $content = ob_get_clean();

        return $content;
    }
}