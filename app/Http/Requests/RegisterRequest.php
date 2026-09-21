<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'same:password'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $failed = $validator->failed();

        if (isset($failed['name']['Required'])) {
            $code = 'name_required';
        } elseif (isset($failed['email']['Required'])) {
            $code = 'email_required';
        } elseif (isset($failed['email']['Email'])) {
            $code = 'invalid_email';
        } elseif (isset($failed['email']['Unique'])) {
            $code = 'email_exists';
        } elseif (isset($failed['password']['Required'])) {
            $code = 'password_required';
        } elseif (isset($failed['password']['Min'])) {
            $code = 'password_min';
        } elseif (isset($failed['confirm_password']['Required'])) {
            $code = 'password_confirmation_required';
        } elseif (isset($failed['confirm_password']['Same'])) {
            $code = 'password_confirmation';
        } else {
            $code = 'validation_error';
        }

        throw new HttpResponseException(
            response()->json([
                'code' => $code,
            ], 422)
        );
    }
}