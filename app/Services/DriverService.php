<?php

namespace App\Services;

use App\Exceptions\DriverException;
use App\Http\Requests\Driver\DriverStoreRequest;
use App\Http\Requests\Driver\DriverUpdateRequest;
use App\Models\Driver;
use Illuminate\Support\Collection;

class DriverService
{
    public function __construct(protected Driver $driver)
    {
    }

    public function list(): Collection
    {
        $drivers = $this->driver->all();
        return $drivers;
    }

    public function findById(int $id): Driver
    {
        $driver = $this->driver->findOrFail($id)->first();
        if ($driver){
            return $driver;
        }
        throw DriverException::driverNotFound($id);
    }

    public function store(DriverStoreRequest $request): Driver
    {
        $data = $request->validated();
        if ($data){
            $driver = $this->driver->create($data);
            return $driver;
        }

        throw DriverException::failedToCreateDriver($data);
    }

    public function update(DriverUpdateRequest $request, Driver $driver): Driver
    {
        $data = $request->validated();
        if ($driver->update($data)){
            return $driver;
        }

        throw DriverException::failedToUpdateDriver($data);
    }

    public function destroy(Driver $driver): void
    {
        if(!$driver->delete()){
            throw DriverException::failedToDeleteDriver();
        }
    }
}
