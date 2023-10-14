<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit22cc785faccc5a543e356424fd476c8b
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit22cc785faccc5a543e356424fd476c8b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit22cc785faccc5a543e356424fd476c8b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit22cc785faccc5a543e356424fd476c8b::$classMap;

        }, null, ClassLoader::class);
    }
}
