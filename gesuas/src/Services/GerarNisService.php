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

    /**
     * @return string Retorna o NIS único gerado
     */
    public function gerarNisUnico() : string
    {
        do {
            
            $nis = $this->gerarNis();
            $existente = $this->cidadaoRepository->buscarCidadaoPorNis($nis);

        } while($existente);

        return $nis;
    }

    /**
     * @return string Retorna o NIS gerado
     */
    private function gerarNis() : string
    {
        $nis = "";

        for($i = 0; $i <= 10; $i++ )
        {
            $nis .= mt_rand(0, 9);
        }

        return $nis;
    }
}