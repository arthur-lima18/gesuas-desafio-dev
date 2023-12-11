<?php

namespace App\Controller;

use App\Entity\Cidadao;
use App\Form\FormType;
use App\Repository\CidadaoRepository;
use App\Services\GerarNisService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CidadaoController extends AbstractController
{
    private $gerarNisService;

    public function __construct(GerarNisService $gerarNisService)
    {
        $this->gerarNisService = $gerarNisService;
    }

    #[Route('/', name: 'pagina_principal')]
    public function index(): Response
    {
        return $this->render('cidadao/index.html.twig');
    }

    #[Route('/cadastrar-cidadao', name: 'cadastrar_cidadao', methods: 'POST')]
    public function cadastrarCidadao(EntityManagerInterface $entityManager, Request $req) : Response
    {
        try {
            $nome = $req->request->get('nome');
            
            $nis = $this->gerarNisService->gerarNisUnico();
            
            $cidadao = new Cidadao();
            $cidadao->setNome($nome);
            $cidadao->setNis($nis);
    
            $entityManager->persist($cidadao);
            $entityManager->flush();
    
            return $this->render('cidadao/index.html.twig', [
                'cidadao' => $cidadao
            ]);
        } catch (Exception $e) {
            return $this->render('cidadao/index.html.twig', [
                'mensagem' => "Não foi possível finalizar o cadastro."
            ]);
        }
    }

    #[Route('/buscar-cidadao', name: 'pesquisar_cidadao', methods: 'POST')]
    public function buscarCidadao(Request $req, CidadaoRepository $cidadaoRepository) : Response
    {
        $nis = $req->request->get('nis');

        $cidadao = $cidadaoRepository->buscarCidadaoPorNis($nis);

        if(!$cidadao) {
            return $this->render('cidadao/index.html.twig', [
                'mensagem' => "Cidadão não encontrado"
            ]);
        }

        return $this->render('cidadao/index.html.twig', [
            'cidadao' => $cidadao
        ]);
    }
    
}
