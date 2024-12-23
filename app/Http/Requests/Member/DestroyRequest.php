<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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
        // not needed
        return [
            'id' => 'required|exists:members,id', // Ensure the member exists
            // id param passeda as part if the URL, ensure id exists in the members table
        ];
    }
}
