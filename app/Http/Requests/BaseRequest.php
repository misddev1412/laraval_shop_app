<?php

namespace App\Http\Requests;

use App\Enumeration\StatusCode;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function failedValidation($validator)
    {
        $errors = $validator->errors()->toArray();
        $response = [
            'status_code' => StatusCode::UNPROCESSABLE_ENTITY,
            'message' => __('validation.failed'),
            'error_code' => StatusCode::UNPROCESSABLE_ENTITY,
            'data' => $errors,
        ];
        throw new \Illuminate\Validation\ValidationException($validator, response()->json($response, 422));
    }
}
