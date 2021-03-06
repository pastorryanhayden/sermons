<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Googlefont implements Rule
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
        return Str::containsAll($value, ['<link', 'href="', 'fonts.googleapis.com', '>']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "This doesn't look like a valid Google Font code.  Did you copy and paste the whole thing?";
    }
}
