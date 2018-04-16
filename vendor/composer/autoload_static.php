<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb014ed345dcb2fd567f7f059f413d15
{
    public static $classMap = array (
        'App\\AppController' => __DIR__ . '/../..' . '/controllers/AppController.php',
        'App\\Config' => __DIR__ . '/../..' . '/models/Config.php',
        'App\\ContactsController' => __DIR__ . '/../..' . '/controllers/custom/ContactsController.php',
        'App\\Controller' => __DIR__ . '/../..' . '/controllers/Controller.php',
        'App\\DBController' => __DIR__ . '/../..' . '/controllers/DBController.php',
        'App\\FrontController' => __DIR__ . '/../..' . '/controllers/FrontController.php',
        'App\\LangController' => __DIR__ . '/../..' . '/controllers/LangController.php',
        'App\\ModelController' => __DIR__ . '/../..' . '/controllers/ModelController.php',
        'App\\Pages' => __DIR__ . '/../..' . '/models/Page.php',
        'App\\PagesController' => __DIR__ . '/../..' . '/controllers/custom/PagesController.php',
        'App\\ViewController' => __DIR__ . '/../..' . '/controllers/ViewController.php',
        'ComposerAutoloaderInitbb014ed345dcb2fd567f7f059f413d15' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitbb014ed345dcb2fd567f7f059f413d15' => __DIR__ . '/..' . '/composer/autoload_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitbb014ed345dcb2fd567f7f059f413d15::$classMap;

        }, null, ClassLoader::class);
    }
}