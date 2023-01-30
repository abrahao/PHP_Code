<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b00be6539d276656deaf0791ddb67e8
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b00be6539d276656deaf0791ddb67e8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b00be6539d276656deaf0791ddb67e8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b00be6539d276656deaf0791ddb67e8::$classMap;

        }, null, ClassLoader::class);
    }
}