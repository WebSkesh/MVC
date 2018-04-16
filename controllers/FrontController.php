<?php
# відповідальність цього класу
# у розборі вхідного азпиту на складові




namespace App;


class FrontController
{
    protected $uri;

    protected $controller;

    protected $action;

    protected $params;

    protected $route;

    protected $method_prefix;

    protected $language;

    public function __construct($uri)
    {
        # видаляємо /MVC з $uri. На хостингу цю строку потрібно закоментувати.
        $uri=str_replace('/MVC/', '', $uri);

        # чистим $uri
        $this->uri = urldecode(trim($uri, '/'));

        # записуємо DEFAULT...
        $routes = Config::getSettings('ROUTES');
        $this->route = Config::getSettings('DEFAULT_ROUTE');
        $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
        $this->language = Config::getSettings('DEFAULT_LANGUAGE');
        $this->controller = Config::getSettings('DEFAULT_CONTROLLER');
        $this->action= Config::getSettings('DEFAULT_ACTION');

        $uri_parts = explode('?', $this->uri);
        $path_parts = explode('/', $uri_parts[0]);

        #echo '<pre>'; var_dump($routes); echo '</pre>';

        # перевіряємо чи не пустий масив
        if (count($path_parts)) {

            # по нашій схемі першим елементом $uri може бути
            # мова, контроллер або роут.
            # Перевіряємо, чи це роут
            if (in_array(strtolower(current($path_parts)), array_keys($routes))) {
                $this->route = strtolower(current($path_parts));
                $this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
                # якщо так, то присвоюємо відповідне значення і зсвоюмо елемент масиву
                # далі перевіряємо чи це мова
            } elseif (in_array(strtolower(current($path_parts)), Config::getSettings('LANGUAGES'))) {
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
                # якщо так, то присвоюємо відповідне значення і зсвоюмо елемент масиву
            }

            # далі у нас може бути тільки контроллер
            if (current($path_parts)) {
                $this->controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            # далі у нас може бути тільки якийсь action
            if (current($path_parts)) {
                $this->action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            $this->params = $path_parts;

        }

    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return mixed
     */
    public function getMethodPrefix()
    {
        return $this->method_prefix;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

}