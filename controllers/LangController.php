<?php
/**
 * Created by PhpStorm.
 * User: Peter
 * Date: 13.04.2018
 * Time: 9:19
 */

namespace App;


class LangController
{
    protected static $data;

    # завантажуємо файл з перекладами
    public static function load ($lang_code) {
        $lang_file_path = ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';

        if (file_exists($lang_file_path)) {
            self::$data = include ($lang_file_path);
        } else {
            throw new  \Exception('Lang file not found: '.$lang_file_path);
        }
    }

    # шукаємо переклад
    public static function getLang ($key, $default_value = '') {
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default_value;
    }

}