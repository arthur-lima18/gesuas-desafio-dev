<?php

namespace App\Services;

use App\Repository\CidadaoRepository;

class GerarNisService
{
    private $cidadaoRepository;

    public function __construct(CidadaoRepository $cidadaoRepository)
    {
        $this->cidadaoRepository = $cidadaoRepository;
    }

    public function gerarNisUnico()
    {
        do {
            
            $nis = $this->gerarNis();
            $existente = $this->cidadaoRepository->buscarCidadaoPorNis($nis);

            if($existente) dd($existente);

        } while($existente);

        return $nis;
    }

    private function gerarNis()
    {
        $nis = "";

        for($i = 0; $i <= 10; $i++ )
        {
            $nis .= mt_rand(0, 9);
        }

        return $nis;
    }
}