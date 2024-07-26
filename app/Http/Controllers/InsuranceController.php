<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsuranceStoreRequest;
use App\Http\Requests\InsuranceUpdateRequest;
use App\Models\Insurance;
use App\Services\InsuranceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    public function __construct(protected InsuranceService $insuranceService)
    {
    }

    public function index(): JsonResponse
    {
        $insurances = $this->insuranceService->list();
        return response()->json($insurances);
    }

    public function show(Insurance $insurance): JsonResponse
    {
        return response()->json($insurance);
    }

    public function store(InsuranceStoreRequest $request): JsonResponse
    {
        $insurance = $this->insuranceService->store($request);
        return response()->json($insurance);
    }

    public function update(InsuranceUpdateRequest $request, Insurance $insurance)
    {
        $insurance = $this->insuranceService->update($request, $insurance);
        return response()->json($insurance);
    }

    public function destroy(Insurance $insurance)
    {
        $this->insuranceService->destroy($insurance);
        return response()->json(['message' => 'Seguradora excluída com sucesso!']);
    }
}
