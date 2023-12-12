
# GESUAS - Desafio Técnico

Projeto desenvolvido com o objetivo de criar uma plataforma para cadastrar e buscar cidadãos utilizando o paradigma da Programação Orientada a Objetos e utilizando o framework Symfony. 

Os Testes Unitários foram desenvolvidos e executados com PHPUnit.

## Requisitos

Você precisará ter instalado em sua máquina o [Docker](https://www.docker.com) e o [Composer](https://getcomposer.org).


## Instalação

Para instalar e executar o projeto, siga os seguintes passos:

Clone o repositório:
```bash
git clone https://github.com/arthur-lima18/gesuas-dev.git
```

Acesse a pasta do projeto
```bash
cd gesuas-dev
```

Execute o build e inicialize o container
```bash
docker-compose up --build
```

Ainda que o container esteja rodando, a aplicação não funcionará e uma mensagem de erro será exibida ao acessá-la pela URL, pois faz-se necessário instalar as dependências do projeto utilizando o Composer. Assim, abra um novo terminal e execute a instalação dos pacotes necessários
```bash
cd gesuas
composer install
```

Após isso o sistema estará rodando na sua máquina em http://localhost:8741/ ou na porta indicada pelo Docker.
## Testes Unitários

Para a realização dos Testes Unitários, siga os seguintes passos:

Acesse a pasta do projeto
```bash
cd gesuas
```

Execute o comando para execução dos Testes com o PHPUnit
```bash
php bin/phpunit
```
## Autor

- [@arthur-lima18](https://www.github.com/arthur-lima18)


## Tecnologias Utilizadas

PHP, Symfony, HTML, CSS, PHPUnit, Docker, Composer


## Referências

 - [PHP](https://www.php.net)
 - [Symfony](https://symfony.com)
 - [PHPUnit](https://phpunit.de)
 - [HTML](https://developer.mozilla.org/en-US/docs/Web/HTML)
 - [CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)
 - [Docker](https://www.docker.com)
 - [Composer](https://getcomposer.org)
 
