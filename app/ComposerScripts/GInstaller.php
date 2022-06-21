<?php

namespace App\ComposerScripts\Installer;


class Installer{
    static public function Install(){
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec('pathman /au '. __DIR__.'/../../themeboot');
        } else {
            shell_exec('sudo ln -s /usr/local/bin/themeboot '. __DIR__.'/../../themeboot');
        }
    }
}