<?php

namespace App\Services;

use App\Http\Requests\DriverStoreRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\Driver;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use function Pest\Laravel\json;

class DriverService
{
    public function list(): Collection
    {
        $drivers = Driver::all();
        return $drivers;
    }

    public function store(DriverStoreRequest $request): Driver
    {
        $driver = Driver::create($request->validated());
        return $driver;
    }

    public function update(DriverUpdateRequest $request, Driver $driver): Driver
    {
        $driver->update($request->validated());
        return $driver;
    }

    public function destroy(Driver $driver): void
    {
        $driver->delete();
    }
}
