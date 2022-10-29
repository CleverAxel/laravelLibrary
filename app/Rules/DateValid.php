<?php
declare(strict_types=1);
namespace App\Rules;

use App\Helpers\DateHelper;
use Illuminate\Contracts\Validation\InvokableRule;

class DateValid implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {   
        $date = explode("-", $value);

        if(DateHelper::isDateValid((int)$date[0], (int)$date[1], (int)$date[2]) == false){
            $fail("the date is unvalid");
        }
    }
}
