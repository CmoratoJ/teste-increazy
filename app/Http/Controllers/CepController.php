<?php

namespace App\Http\Controllers;

use App\Http\Services\CepService;

class CepController extends Controller
{
    private CepService $service;

    public function __construct()
    {
        $this->service = new CepService();
    }

    public function index (string $ceps): object
    {
        $results = $this->service->search($ceps);
        return response()->json($results);
    }
}
