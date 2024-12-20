<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'role' => 'sometimes|integer|in:0,1,2,3',
            'user_id' => 'sometimes|exists:users,id',
            'org_id' => 'sometimes|exists:organizations,id',
            'status' => 'sometimes|integer|in:0,1,2',
        ];
    }
}
