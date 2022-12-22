<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorDeHtmlTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioLogin implements RequestHandlerInterface
{
    use RenderizadorDeHtmlTrait;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($_SESSION['logado'] === true) {
            return new Response(302,['Location' => '/listar-cursos']);
        }

       $html = $this->renderizaHtml('login/formulario.php', [
            'titulo' => 'Login de Usuário'
        ]);

        return new Response('200', [], $html);
    }
}