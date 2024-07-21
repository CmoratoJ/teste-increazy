<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class CepService
{
    private $baseUri = 'https://viacep.com.br/ws/';

    public function search(string $ceps): array
    {
        $arrCeps = explode(',', $ceps);
        $results = [];

        foreach ($arrCeps as $cep) {
            $cep = str_replace('-', '', $cep);
            $response = Http::get("{$this->baseUri}{$cep}/json/");
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

        return $results;
    }
}
