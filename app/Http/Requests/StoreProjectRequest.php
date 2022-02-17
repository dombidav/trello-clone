<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->can('projects.create') || auth()->user()->can('create', Project::class);
    }

    public function rules(): array
    {
        return [
            'name' => ['required','min:3', 'max:42']
        ];
    }
}
