<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

class Aluno
{
    private CPF $cpf;
    private string $nome;
    private Email $email;
    private array $telefones;

    public static function comCPFEmailENome(string $cpf, string $email, string $nome): self
    {
        $cpf = new CPF($cpf);
        $email = new Email($email);
        return new Aluno($cpf, $nome, $email);
    }

    public function __construct(CPF $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function adicionaTelefone(string $ddd, string $numero): self
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    /** @return Telefone[] */
    public function telefones(): array
    {
        return $this->telefones;
    }
}
