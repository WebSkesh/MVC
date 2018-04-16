<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 12.04.2018
 * Time: 9:25
 */

namespace App;


abstract class Controller
{
    protected $data;

    protected $model;

    protected $params;

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    public function __construct($data = array())
    {
        $this->data = $data;
        $this->params = AppController::getRouter()->getParams();

    }

    public abstract function index();

}