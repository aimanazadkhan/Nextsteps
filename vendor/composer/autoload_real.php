<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitcdb9c54a3350ce3279dd42e4e8671427
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitcdb9c54a3350ce3279dd42e4e8671427', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitcdb9c54a3350ce3279dd42e4e8671427', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitcdb9c54a3350ce3279dd42e4e8671427::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
