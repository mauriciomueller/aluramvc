<?php
namespace Alura\Cursos\Entity;
/**
 * @Entity
 * @Table(name="usuarios")
 */
class Usuario
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $email;
    /**
     * @Column(type="string")
     */
    private $senha;

    public function senhaEstaCorreta(string $senhaPura): bool
    {
        return password_verify($senhaPura, $this->senha);
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setSenha($senha): void
{
        $this->senha = $senha;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }
}
