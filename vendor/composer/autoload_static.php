<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49417cd3023e08323d22e672e5a9e684
{
    public static $files = array (
        'c2c8b4c3b32bcfd3011957f0fdd9f363' => __DIR__ . '/..' . '/mwdelaney/sage-acf-gutenberg-blocks/sage-acf-gutenberg-blocks.php',
    );

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
        'App\\Providers\\ThemeServiceProvider' => __DIR__ . '/../..' . '/app/Providers/ThemeServiceProvider.php',
        'App\\View\\Components\\Alert' => __DIR__ . '/../..' . '/app/View/Components/Alert.php',
        'App\\View\\Composers\\App' => __DIR__ . '/../..' . '/app/View/Composers/App.php',
        'App\\View\\Composers\\Post' => __DIR__ . '/../..' . '/app/View/Composers/Post.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit49417cd3023e08323d22e672e5a9e684::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit49417cd3023e08323d22e672e5a9e684::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit49417cd3023e08323d22e672e5a9e684::$classMap;

        }, null, ClassLoader::class);
    }
}