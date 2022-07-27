<?php

namespace Cezarcastrorosa\Curso017\Academico\Dominio\Aluno;

use Cezarcastrorosa\Curso017\Shared\Dominio\CPF;

class Aluno
{
    private CPF $cpf;
    private string $nome;
    private Email $email;
    private array $telefones = [];

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
        if (count($this->telefones) === 2) {
            throw new AlunoNaoPodeTerMaisDeDoisTelefones("Não é permitido que um aluno tenha mais de 2 telefones.");
        }

        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): CPF
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
