<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitca94ffb47c675edf27b82a83a9059913
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitca94ffb47c675edf27b82a83a9059913::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitca94ffb47c675edf27b82a83a9059913::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitca94ffb47c675edf27b82a83a9059913::$classMap;

        }, null, ClassLoader::class);
    }
}
