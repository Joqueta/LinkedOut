<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'title'   => ['required', 'string', 'min:3', 'max:100'],
            'content' => ['required', 'string', 'min:10', 'max:500'],
            'type'    => ['required', 'exists:types,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.min' => 'Le contenu doit faire au moins 10 caractères.',
            'content.max' => 'Le contenu ne peut pas dépasser 500 caractères.',
            'title.required' => 'Le titre est obligatoire.',
            'type.required' => 'Choisis un type de publication.',
            'type.exists'   => 'Type invalide.',
        ];
    }
}
