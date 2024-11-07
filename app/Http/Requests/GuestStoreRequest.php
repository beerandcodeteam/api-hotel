<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class GuestStoreRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed', Password::min(8)->letters()->uncompromised()->numbers()->mixedCase()],
            'name' => 'required|string|min:3|max:255',
            'birthdate' => 'required|date|before:now',
            'is_foreigner' => 'required|boolean',
            'cpf' => 'required_if:is_foreigner,0|max:11',
            'rg' => 'required_if:is_foreigner,0|max:15',
            'passport' => 'required_if:is_foreigner,1|string|min:3|max:255',
        ];
    }
}
