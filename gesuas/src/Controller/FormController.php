<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormController extends AbstractController
{
    #[Route('/')]
    public function formulario() : Response
    {
        return $this->render('form.html.twig');
    }
}