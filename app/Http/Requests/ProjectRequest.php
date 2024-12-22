<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title'=>'required|string|max:50',
            'slug'=>'required|string|max:50',
            'description'=>'required|string|max:255',
            'created_by'=>'required|string|exists:users,name',
            'deadline'=>'required|numeric',
            'organization_id'=>'required|numeric|exists:organizations,id'
        ];
    }
}
