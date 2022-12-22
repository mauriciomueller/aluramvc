<?php

use Alura\Cursos\Controller\{CursosEmJson,
    CursosEmXml,
    ExcluirCurso,
    FormularioEdicao,
    FormularioInsercao,
    FormularioLogin,
    ListarCursos,
    Logout,
    Persistencia,
    RealizarLogin,
    FormularioRegistro,
    RealizarRegistro};
use Alura\Cursos\Middleware\Route;

Route::protected([
    '/listar-cursos' => ListarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => ExcluirCurso::class,
    '/alterar-curso' => FormularioEdicao::class,
    '/logout' => Logout::class
]);

Route::unprotected([
    '/login' => FormularioLogin::class,
    '/realizar-login' => RealizarLogin::class,
    '/registrar' => FormularioRegistro::class,
    '/realizar-registro' => RealizarRegistro::class,
    '/v1/api/cursos/json' => CursosEmJson::class,
    '/v1/api/cursos/xml' => CursosEmXml::class

]);