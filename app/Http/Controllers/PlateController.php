<?php

namespace App\Http\Controllers;

use App\Http\Requests\Plate\PlateStoreRequest;
use App\Http\Requests\Plate\PlateUpdateRequest;
use App\Models\Plate;
use App\Services\PlateServices;
use Illuminate\Http\JsonResponse;

class PlateController extends Controller
{
    public function __construct(protected PlateServices $plateServices)
    {
    }

    public function index(): JsonResponse
    {
        $plates = $this->plateServices->list();
        return response()->json($plates);
    }

    public function show(Plate $plate): JsonResponse
    {
        return response()->json($plate);
    }

    public function store(PlateStoreRequest $request): JsonResponse
    {
        $plate = $this->plateServices->store($request);
        return response()->json($plate);
    }

    public function update(PlateUpdateRequest $request, Plate $plate): JsonResponse
    {
        $plate = $this->plateServices->update($request, $plate);
        return response()->json($plate);
    }

    public function destroy(Plate $plate): JsonResponse
    {
        $this->plateServices->destroy($plate);
        return response()->json(['message' => 'Placa excluída com sucesso']);
    }
}
