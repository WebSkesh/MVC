<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 11.04.2018
 * Time: 13:01
 */

namespace App;


class Config
{
    protected static $settings = array();

    /**
     * @return array
     */
    public static function getSettings($key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : NULL;
    }

    /**
     * @param array $settings
     */
    public static function setSettings($key, $value): void
    {
        self::$settings[$key] = $value;
    }

}