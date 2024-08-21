<?php

namespace App\Services;

use App\Exceptions\PlateException;
use App\Http\Requests\Plate\PlateStoreRequest;
use App\Http\Requests\Plate\PlateUpdateRequest;
use App\Models\Plate;
use Illuminate\Support\Collection;

class PlateServices
{

    public function __construct(protected Plate $plate)
    {
    }

    public function list(): Collection
    {
        $plates = $this->plate->all();
        return $plates;
    }

    public function findById(int $id): Plate
    {
        $plate = $this->plate->findOrFail()->first();

        if ($plate) {
            return $plate;
        }
        throw PlateException::plateNotFound($id);
    }

    public function store(PlateStoreRequest $request): Plate
    {
        $data = $request->validated();

        if ($data) {
            $plate = $this->plate->create($data);
            return $plate;
        }
        throw PlateException::failedToCreatePlate($data);
    }

    public function update(PlateUpdateRequest $request, Plate $plate): Plate
    {
        $data = $request->validated();
        if ($plate->update($data)) {
            return $plate;
        }

        throw PlateException::failedToUpdatePlate($data);
    }

    public function destroy(Plate $plate): void
    {
        if (!$plate->delete()) {
            throw PlateException::failedToDeletePlate();
        }
    }
}
