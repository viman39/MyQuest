<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb20a38c7455dc2f423c17cb6ac993726
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\Test\\' => 15,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\Test\\' => 
        array (
            0 => __DIR__ . '/../..' . '/test',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb20a38c7455dc2f423c17cb6ac993726::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb20a38c7455dc2f423c17cb6ac993726::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
