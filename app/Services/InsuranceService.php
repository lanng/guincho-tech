<?php

namespace App\Services;

use App\Http\Requests\InsuranceStoreRequest;
use App\Http\Requests\InsuranceUpdateRequest;
use App\Models\Insurance;
use Illuminate\Support\Collection;

class InsuranceService
{
    public function list(): Collection
    {
        $insurances = Insurance::all();
        return $insurances;
    }

    public function store(InsuranceStoreRequest $request): Insurance
    {
        $insurance = Insurance::create($request->validated());
        return $insurance;
    }

    public function update(InsuranceUpdateRequest $request, Insurance $insurance): Insurance
    {
        $insurance->update($request->validated());
        return $insurance;
    }

    public function destroy(Insurance $insurance): void
    {
        $insurance->delete();
    }
}
