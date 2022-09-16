<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'correo_est' => 'required|string|email',
            'password' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'La contraseña es obligatoria',
            'password.string' => 'Las contraseñas son de tipo caracter',
            'correo_est.email' => 'Direccion de correo invalida',
            'correo_est.required' => 'Correo electronico requerido',
            'correo_est.string' => 'Los correos deben ser de tipo cadena'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error_code' => 'VALIDATION_ERROR',
            'mensaje'   => 'Asegurese de enviar los datos correctos',
            'errors'    => $validator->errors()
        ], 422));
    }
}
