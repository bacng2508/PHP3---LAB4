<?php

namespace App\Http\Requests\ValidateTest;

use Illuminate\Foundation\Http\FormRequest;

class Ex02 extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:10|unique:posts,title',
            'content' => 'required|min:50',
            'genre' => 'required|in:personal,story,society'
        ];
    }
}
