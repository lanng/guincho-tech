<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\DriverStoreRequest;
use App\Http\Requests\Driver\DriverUpdateRequest;
use App\Models\Driver;
use App\Services\DriverService;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    public function __construct(protected DriverService $driverService)
    {}

    public function index(): JsonResponse
    {
        $drivers = $this->driverService->list();
        return response()->json($drivers);
    }

    public function store(DriverStoreRequest $request): JsonResponse
    {
        $driver = $this->driverService->store($request);
        return response()->json($driver);
    }

    public function show(Driver $driver): JsonResponse
    {
        return response()->json($driver);
    }

    public function update(DriverUpdateRequest $request, Driver $driver): JsonResponse
    {
        $driver = $this->driverService->update($request, $driver);
        return response()->json($driver);
    }

    public function destroy(Driver $driver)
    {
        $this->driverService->destroy($driver);
        return response()->json(['message' => 'Motorista deletado com sucesso!']);
    }
}
