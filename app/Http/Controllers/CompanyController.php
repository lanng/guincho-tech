<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(protected CompanyService $companyService)
    {}

    public function index(): JsonResponse
    {
        $companies = $this->companyService->list();
        return response()->json($companies);
    }

    public function store(CompanyStoreRequest $request): JsonResponse
    {
        $company = $this->companyService->store($request);

        return response()->json($company);
    }

    public function show(Company $company)
    {
        return response()->json($company);
    }

    public function update(CompanyUpdateRequest $request, Company $company): JsonResponse
    {
        $company = $this->companyService->update($request, $company);

        return response()->json($company);
    }

    public function destroy(Company $company)
    {
        $this->companyService->destroy($company);

        return response()->json(['message' => 'Empresa deletada.']);
    }
}
