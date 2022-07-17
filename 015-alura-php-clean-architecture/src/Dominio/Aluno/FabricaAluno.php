<?php

namespace Cezarcastrorosa\Curso015\Dominio\Aluno;

class FabricaAluno
{
    private Aluno $aluno;

    public function comCPFEmailENome(string $numeroCPF, string $enderecoEmail, string $nome): self
    {
        $cpf = new CPF($numeroCPF);
        $email = new Email($enderecoEmail);
        $this->aluno = new Aluno($cpf, $nome, $email);
        return $this;
    }

    public function adicionaTelefone($ddd, $numero): self
    {
        $this->aluno->adicionaTelefone($ddd, $numero);
        return $this;
    }

    public function aluno(): Aluno
    {
        return $this->aluno;
    }
}