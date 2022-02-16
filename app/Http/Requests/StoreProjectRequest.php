<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','min:3', 'max:42'],
            'username' =>['required_without:user_id', 'prohibits:user_id', 'exists:users,username'],
            'user_id' =>['required_without:username', 'prohibits:username' ,'exists:users,id'],
        ];
    }
}
