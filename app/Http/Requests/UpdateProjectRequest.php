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
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:7', 'max:42', Rule::unique('projects', 'name')->ignore($this->project->id)],
            'username' => ['username', Rule::unique('users', 'username')->ignore($this->user->id)],
            # 'user_id' => ['id', Rule::unique('users', 'id')->ignore($this->user->id)],
        ];
    }
}
