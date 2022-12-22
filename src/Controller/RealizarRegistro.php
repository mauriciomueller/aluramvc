<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizarRegistro implements RequestHandlerInterface
{
    use FlashMessageTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $email = filter_var($request->getParsedBody()['email'], FILTER_VALIDATE_EMAIL);

        if ($email === false) {
            $this->defineMensagem('danger','Email inválido');
            return new Response(302, ['Location' => '/registrar']);
        }

        $senha = filter_var($request->getParsedBody()['senha'], FILTER_SANITIZE_STRING);

        if ($senha === false) {
            $this->defineMensagem('danger', 'Email inválido.');
            return new Response(302, ['Location' => '/registrar']);
        }

        $usuario = new Usuario();

        $usuarioRepositorio = $this->entityManager
            ->getRepository(Usuario::class)
            ->findOneBy(['email' => $email]);

        if (!is_null($usuarioRepositorio)) {
            if (!is_null($usuarioRepositorio->getEmail())) {
                $this->defineMensagem('danger', 'Este email já foi registrado. Tente outro email.');
                return new Response(302, ['Location' => '/registrar']);
            }
        }

        $senha = password_hash($senha, PASSWORD_ARGON2I);

        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $this->entityManager->persist($usuario);
        $this->entityManager->flush();

        $usuarioRepositorio = $this->entityManager
            ->getRepository(Usuario::class)
            ->findOneBy(['email' => $email]);

        $this->defineMensagem('success', 'Seu usuário foi registrado com sucesso.');
        return new Response(302, ['Location' => '/login']);

    }
}