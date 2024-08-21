<?php

namespace App\Services;

use App\Exceptions\InsuranceException;
use App\Http\Requests\Insurance\InsuranceStoreRequest;
use App\Http\Requests\Insurance\InsuranceUpdateRequest;
use App\Models\Insurance;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\This;

class InsuranceService
{

    public function __construct(protected Insurance $insurance)
    {
    }

    public function list(): Collection
    {
        $insurances = $this->insurance->all();
        return $insurances;
    }

    public function findById(int $id): Insurance
    {
        $insurance = $this->insurance->findOrFail($id)->first();
        if ($insurance) {
            return $insurance;
        }

        throw InsuranceException::insuranceNotFound($id);
    }

    public function store(InsuranceStoreRequest $request): Insurance
    {
        $data = $request->validated();
        if ($data) {
            $insurance = $this->insurance->create($data);
            return $insurance;
        }
        throw InsuranceException::failedToCreateInsurance($data);
    }

    public function update(InsuranceUpdateRequest $request, Insurance $insurance): Insurance
    {
        $data = $request->validated();
        if ($insurance->update($data)) {
            return $insurance;
        }
        throw InsuranceException::failedToUpdateInsurance($data);
    }

    public function destroy(Insurance $insurance): void
    {
        if (!$insurance->delete()) {
            throw InsuranceException::failedToDeleteInsurance();
        }
    }
}
