<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidDates implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $tmp = explode(',', $value);
        foreach($tmp as $i) {
            $x = explode('/', $i); 
            if(checkdate($x[0], $x[1], $x[2])) continue;
            else return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You have an invdalid date in your list!';
    }
}
