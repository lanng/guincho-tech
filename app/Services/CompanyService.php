<?php

namespace App\Services;

use App\Exceptions\CompanyException;
use App\Http\Requests\Company\CompanyStoreRequest;
use App\Http\Requests\Company\CompanyUpdateRequest;
use App\Models\Company;
use Exception;
use Illuminate\Support\Collection;

class CompanyService
{

    public function __construct(protected Company $company)
    {
    }

    public function list(): Collection
    {
        $companies = $this->company->all();
        return $companies;
    }

    public function findById(int $id): Company
    {
        $company = $this->company->findOrFail($id)->first();
        if ($company){
            return $company;
        }
        throw CompanyException::companyNotFound();
    }

    public function store(CompanyStoreRequest $request): Company
    {
        $data = $request->validated();
        if ($data) {
            $company = $this->company->create($data);
            return $company;
        }
        throw CompanyException::failedToCreateCompany($data);
    }

    public function update(CompanyUpdateRequest $request, Company $company): Company
    {
        $data = $request->validated();
        if ($company->update($data)) {
            return $company;
        }
        throw CompanyException::failedToUpdateCompany($data);
    }

    public function destroy(Company $company): void
    {
        if (!$company->delete()) {
            throw CompanyException::failedToDeleteCompany();
        }
    }
}
