<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LumpsumRfqRequest extends FormRequest
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
            'date' => 'required',
            'number_cr' => 'required',
            'job' => 'required',
            'offer_number' => 'required',
            'include_tax' => 'required',
            'total_price' => 'required',
            'responsible' => 'required',
            'company' => 'required',
            'name_hod' => 'required',
        ];
    }
}
