<?php

namespace App\Http\Controllers;

use App\Http\Requests\Invoice\InvoiceStoreRequest;
use App\Http\Requests\Invoice\InvoiceUpdateRequest;
use App\Models\Invoice;
use App\Services\InvoiceService;
use Illuminate\Http\JsonResponse;

class InvoiceController extends Controller
{
    public function __construct(protected InvoiceService $invoiceService)
    {
    }

    public function index(): JsonResponse
    {
        $invoices = $this->invoiceService->list();
        return response()->json($invoices);
    }

    public function show(Invoice $invoice): JsonResponse
    {
        return response()->json($invoice);
    }

    public function store(InvoiceStoreRequest $request): JsonResponse
    {
        $invoice = $this->invoiceService->store($request);
        return response()->json($invoice);
    }

    public function update(InvoiceUpdateRequest $request, Invoice $invoice): JsonResponse
    {
        $invoice = $this->invoiceService->update($request, $invoice);
        return response()->json($invoice);
    }

    public function destroy(Invoice $invoice): JsonResponse
    {
        $invoice->delete();
        return response()->json(['message' => 'Nota excluída com sucesso']);
    }
}
