<?php

namespace App\Services;

use App\Http\Requests\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Invoice\InvoiceUpdateRequest;
use App\Models\Invoice;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class InvoiceService
{
    public function list(): LengthAwarePaginator
    {
         return Invoice::paginate('30');
    }

    public function store(InvoiceStoreRequest $request): Invoice
    {
        $invoice = Invoice::create($request->validated());
        return $invoice;
    }

    public function update(InvoiceUpdateRequest $request, Invoice $invoice): Invoice
    {
        $invoice->update($request->validated());
        return $invoice;
    }

    public function destroy(Invoice $invoice): void
    {
        $invoice->delete();
    }
}
