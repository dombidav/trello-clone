<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class AttachRequest extends FormRequest
{
    public function authorize(): bool
    {
        $project = Project::findOrFail($this->project_id);
        return auth()->user()->isAn('admin') || $project->user_id === auth()->id();
    }

    public function rules(): array
    {
        return [
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }
}
