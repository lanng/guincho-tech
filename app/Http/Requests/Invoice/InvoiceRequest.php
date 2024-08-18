<?php

namespace App\Http\Requests\Invoice;

use App\Enums\InvoiceStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'insurance_id' => 'required|exists:insurances,id',
            'company_id' => 'required|exists:companies,id',
            'invoice_number' => 'required|numeric',
            'value' => 'required|numeric',
            'issue_date' => 'required|date',
            'due_date' => 'nullable|date',
            'status' => ['required', 'in:' .  implode(',', InvoiceStatusEnum::getValues())],
        ];
    }

    public function attributes(): array
    {
        return [
            'insurance_id' => 'seguradora',
            'company_id' => 'empresa',
            'invoice_number' => 'nota fiscal',
            'value' => 'valor',
            'issue_data' => 'data de emissão',
            'due_data' => 'data de vencimento',
            'status' => 'status',
        ];
    }

    public function messages(): array
    {
        return [
            'status.in' => __('validation.enum', ['attribute' => 'status']),
        ];
    }
}
