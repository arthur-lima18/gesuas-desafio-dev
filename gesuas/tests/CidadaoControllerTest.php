<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CidadaoControllerTest extends WebTestCase
{
    public function testeCadastrarCidadao(): void
    {
        $client = static::createClient();
        $client->request('POST', '/cadastrar-cidadao', ['nome' => 'Teste Unitário']);

        $this->assertSelectorTextContains('h4', 'Nome: Teste Unitário');
    }
    
    public function testeBuscarCidadaoSucesso(): void
    {
        $client = static::createClient();
        $client->request('POST', '/buscar-cidadao', ['nis' => '12345678901']);
        
        $this->assertSelectorTextContains('h4', 'Nome: Primeiro Teste');
    }
    
    public function testeBuscarCidadaoFalha(): void
    {
        $client = static::createClient();
        $client->request('POST', '/buscar-cidadao', ['nis' => '123']);
        
        $this->assertSelectorTextContains('h4', 'Cidadão não encontrado');
    }
}
