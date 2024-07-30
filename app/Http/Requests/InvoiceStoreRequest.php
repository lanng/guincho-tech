<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'insurance_id' => 'required',
            'company_id' => 'required',
            'invoice_number' => 'required|numeric',
            'value' => 'required|numeric',
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date',
            'status' => 'required',
        ];
    }
}
