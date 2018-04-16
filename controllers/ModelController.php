<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 16.04.2018
 * Time: 12:13
 */

namespace App;


abstract class ModelController
{
    protected $db;

    public function __construct() {
        $this->db = AppController::$db;
    }

}