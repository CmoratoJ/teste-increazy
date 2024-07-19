<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function search (string $ceps): object
    {
        $arrCeps = explode(',', $ceps);
        $results = [];

        foreach ($arrCeps as $cep) {
            $cep = str_replace('-', '', $cep); // Remove hyphens if present
            $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");
            if ($response->successful()) {
                $data = $response->json();
                if (!isset($data['erro'])) {
                    $results[] = [
                        'cep' => $data['cep'],
                        'label' => "{$data['logradouro']}, {$data['localidade']}",
                        'logradouro' => $data['logradouro'],
                        'complemento' => $data['complemento'],
                        'bairro' => $data['bairro'],
                        'localidade' => $data['localidade'],
                        'uf' => $data['uf'],
                        'ibge' => $data['ibge'],
                        'gia' => $data['gia'],
                        'ddd' => $data['ddd'],
                        'siafi' => $data['siafi'],
                    ];
                }
            }
        }

        return response()->json($results);
    }
}
