<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array|
     */
    public function messages()
    {
        return [
            'required' => 'Ce champ est requis',
            'max' => 'Ce champ est trop long',
            'email' => 'L’adresse e-mail n’est pas valide',
            'min' => 'Ce champ est trop court',
            'confirmed' => 'Les mot de passe ne sont pas identique'
        ];
    }
}
