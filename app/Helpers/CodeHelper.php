<?php
    namespace App\Helpers;
    class CodeHelper{
        public static $okCode = 200;

        public static function returnExplanationCode($code){
            
            switch($code){
                case 200:
                    return "Everything is good";
                case 404:
                    return "The search didn't find anything";
                case 2002:
                    return "We can't probably connect to the database";
                default:
                    return "An unknow (yet) error occured - code : ". $code;
            }
        }

    }
?>