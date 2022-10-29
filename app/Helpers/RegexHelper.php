<?php
    declare(strict_types=1);
    namespace App\Helpers;

    class RegexHelper{
        public static function isAnUnsignedInteger(string $input){
            return preg_match("/^[0-9]+$/", $input) == 1;
        }
    }
?>