<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4db2f8daa5fca6b2a64fd55cfd990e74
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4db2f8daa5fca6b2a64fd55cfd990e74::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4db2f8daa5fca6b2a64fd55cfd990e74::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4db2f8daa5fca6b2a64fd55cfd990e74::$classMap;

        }, null, ClassLoader::class);
    }
}
