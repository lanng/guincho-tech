<?php

namespace App\Services;

use App\Http\Requests\InvoiceStoreRequest;
use App\Http\Requests\InvoiceUpdateRequest;
use App\Models\Invoice;
use Illuminate\Support\Collection;

class InvoiceService
{
    public function list(): Collection
    {
        $invoices = Invoice::all();
        return $invoices;
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
