<?php

namespace Alura\Cursos\Helper;

trait FlashMessageTrait
{
    public function defineMensagem(string $tipoMensagem, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $tipoMensagem;
        $_SESSION['mensagem'] = $mensagem;
    }
}