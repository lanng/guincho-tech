<?php

namespace App\Services;

use App\Exceptions\InvoiceException;
use App\Http\Requests\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Invoice\InvoiceUpdateRequest;
use App\Models\Company;
use App\Models\Invoice;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InvoiceService
{

    public function __construct(protected Invoice $invoice, protected Company $company)
    {
    }

    public function list(): LengthAwarePaginator
    {
        return $this->invoice->paginate('30');
    }

    public function store(InvoiceStoreRequest $request): Invoice
    {
        $data = $request->validated();
        $company = $this->company->find($data['company_id']);
        $this->validateData($data, $company);

        try {
            $invoice = $this->invoice->create($data);
            return $invoice;
        } catch (Exception $exception) {
            error_log("Error storing invoice: " . $exception->getMessage());
            throw InvoiceException::failedToCreateInvoice($exception);
        }
    }

    public function update(InvoiceUpdateRequest $request, Invoice $invoice): Invoice
    {
        $data = $request->validated();
        if ($invoice->update($data)) {
            return $invoice;
        }

        throw InvoiceException::failedToUpdateInvoice($data);
    }

    private function validateData(array $data, Company $company): void
    {
        //function to validate $data
        if ($data['due_date'] > $data['issue_date']) {
            throw InvoiceException::dueDateShorterThanIssueDate();
        }

        if (!$company->isActive()) {
            throw InvoiceException::companyIsDisable();
        }

        if ($data['value'] <= 0) {
            throw InvoiceException::valueIsNegativeOrZero();
        }

        if (isset($data['toll']) && $data['toll'] <= 0) {
            throw InvoiceException::tollValueIsNegativeOrZero();
        }

        if ($this->invoiceNumberAlreadyExistsInCompany($company, $data)) {
            throw InvoiceException::invoiceNumberDuplicated();
        }
    }

    private function invoiceNumberAlreadyExistsInCompany(Company $company, array $data): bool
    {
        $invoiceNumber = $data['invoice_number'];
        try {
            return $this->invoice->where('company', '=', $company->id)
                ->where('invoice_number', '=', $invoiceNumber)
                ->exists();
        } catch (Exception $exception) {
            error_log("Error checking invoice number: " . $exception->getMessage());
            throw InvoiceException::invoiceNumberCheckFailed($exception);
        }
    }

    public function destroy(Invoice $invoice): void
    {
        if (!$invoice->delete()) {
            throw InvoiceException::failedToDeleteInvoice();
        }
    }
}
