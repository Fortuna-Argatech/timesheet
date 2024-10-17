<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTimeLogRequest extends FormRequest
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
            'activity_type' => ['required', 'string'],
            'from_time' => ['required', 'date_format:Y-m-d\TH:i'],
            'to_time' => ['required', 'date_format:Y-m-d\TH:i', 'after:from_time'],
            'hours' => ['required', 'numeric'],
            'billing_amount' => ['required', 'numeric'],
        ];
    }
}
