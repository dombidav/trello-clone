<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'stage_id' => ['exists:tasks'],
            'name' =>['max:32','unique:tasks,name',Rule::unique('tasks', 'name')->ignore($this->task->id)],
            'description' =>[]
        ];
    }
}
