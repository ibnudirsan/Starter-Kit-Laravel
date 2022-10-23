<?php

namespace App\Rules\customer;

use Illuminate\Contracts\Validation\Rule;

/*
|--------------------------------------------------------------------------
| Rumah Dev
| Backend Developer : ibudirsan
| Email             : ibnudirsan@gmail.com
| Copyright © RumahDev 2022
|--------------------------------------------------------------------------
*/
class BirthYearRule implements Rule
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
        return $value < date('Y-m-d');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute : Date of birth must be smaller than today\'s date '.date('Y-m-d').'.';
    }
}
