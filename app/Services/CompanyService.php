<?php

namespace App\Services;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyService
{
    public function list(): Collection
    {
        $companies = Company::all();
        return $companies;
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());

        return $company;
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->update($request->validated());

        return $company;
    }

    public function destroy(Company $company)
    {
        $company->delete();
    }
}
