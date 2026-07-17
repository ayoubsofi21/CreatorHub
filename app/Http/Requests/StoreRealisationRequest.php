<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealisationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'media_url' => 'required|url',
            'media_type' => 'required|in:image,youtube,vimeo',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ];
    }
}