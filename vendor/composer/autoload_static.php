<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15fe256e5a234b90180192bf0fe59371
{
    public static $prefixesPsr0 = array (
        'J' => 
        array (
            'JsonRPC' => 
            array (
                0 => __DIR__ . '/..' . '/fguillot/json-rpc/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit15fe256e5a234b90180192bf0fe59371::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}