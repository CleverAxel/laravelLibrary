<?php
    declare(strict_types=1);
    namespace App\Helpers;

    class DateHelper{
        public static function isYearLeap(int $year){
            return ($year%400 == 0 || $year%100 != 0) && ($year%4==0);
        }

        public static function isDateValid(int $year, int $month, int $day){
            if($month < 1 || $month > 12 || $day < 1 || $day > 31){
                return false;
            }

            if($month == 4 || $month == 6 || $month == 9 || $month == 11){
                if($day > 30){
                    return false;
                }
            }

            if($month == 2){
                if(self::isYearLeap($year)){
                    if($day > 29){
                        return false;
                    }
                }else{
                    if($day > 28){
                        return false;
                    }
                }
            }
            return true;
        }
    }
?>