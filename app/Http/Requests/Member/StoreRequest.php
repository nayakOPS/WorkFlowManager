<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'role' => 'required|integer|in:0,1,2,3', // Owner, Admin, Member, Guest
            'user_id' => 'required|exists:users,id',
            'org_id' => 'required|exists:organizations,id',
            'status' => 'required|integer|in:0,1,2', // Active, Suspended, Left
        ];
    }
}
