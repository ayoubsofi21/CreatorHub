<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealisationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'media_url' => 'sometimes|url',
            'media_type' => 'sometimes|in:image,youtube,vimeo',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ];
    }
}