<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' =>'required',
            'photo'=>'required|image|mimes:png,jpg',
            'email'=>'required|unique:admins',
            'password'=>'required|min:8',
            'Status'=>'string',
            'phone'=>'min:11',
            'role'=>'string',
            'city'=>'string',
        ];
    }
}
