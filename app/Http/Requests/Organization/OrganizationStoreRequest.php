<?php

namespace App\Http\Requests\Organization;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationStoreRequest extends FormRequest
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
            "avatar"=>"string",
            "name"=>"required|string|max:255|unique:organizations,name,except,id",
            "description"=>"required|string|max:255",
            "address"=>"required|string|max:65",
            "phone"=>"required|string|max:20|unique:organizations,phone,except,id",
        ];
    }
}
