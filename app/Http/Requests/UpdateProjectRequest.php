<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property Project project
 * @property User user
 */

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:42'],
            'username' =>['prohibits:user_id', 'exists:users,username'],
            'user_id' =>['prohibits:username' ,'exists:users,id'],
        ];
    }
}
