<?php

namespace App\Rules;

use App\Campus;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;

class ValidCampus implements Rule
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
            if(Campus::find($i)) continue;
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
        return 'Must contain valid campuses.';
    }
}
