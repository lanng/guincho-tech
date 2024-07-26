<?php

namespace App\Services;

use App\Http\Requests\PlateStoreRequest;
use App\Http\Requests\PlateUpdateRequest;
use App\Models\Plate;
use Illuminate\Support\Collection;

class PlateServices
{
    public function list(): Collection
    {
        $plates = Plate::all();
        return $plates;
    }

    public function store(PlateStoreRequest $request): Plate
    {
        $plate = Plate::create($request->validated());
        return $plate;
    }

    public function update(PlateUpdateRequest $request, Plate $plate): Plate
    {
        $plate->update($request->validated());
        return $plate;
    }

    public function destroy(Plate $plate): void
    {
        $plate->delete();
    }
}
