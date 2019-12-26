<?php

namespace App\Utilities;

class DebugUtil {
    public static function kill($data){
        var_dump($data);
        die();
    }

    public static function killp($data){
        print_r($data);
        die();
    }
}