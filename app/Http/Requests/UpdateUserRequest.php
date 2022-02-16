<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\IsValidPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property User user
 */
class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['max:32', Rule::unique('users', 'username')->ignore($this->user->id)],
            'email' => ['email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password' => ['required', 'min:8', 'confirmed', new IsValidPassword ],
            'current_password' => ['required', 'current_password:api'], // TODO: Only allow password change if the current user is the same as the user being updated
        ];
    }
}
