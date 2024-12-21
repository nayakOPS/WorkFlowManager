<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => 'nullable|integer|in:0,1,2,3',
            'status' => 'nullable|integer|in:0,1,2',
            'org_id' => 'nullable|exists:organizations,id',
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}
