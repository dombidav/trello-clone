<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsValidPassword implements Rule
{
    public function passes($attribute, $value): bool
    {
        return preg_match('/^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-+<>:;]).{8,}$/', $value);
    }

    public function message(): string
    {
        return 'The :attribute must be at least 8 characters and contain at least one lowercase letter, one uppercase letter, one digit and one special character.';
    }
}
