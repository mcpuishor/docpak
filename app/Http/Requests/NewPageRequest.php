<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewPageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return config('app.editable');
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:187|min:3',
            'section_id' => 'required|integer|exists:sections,id',
        ];
    }
}
