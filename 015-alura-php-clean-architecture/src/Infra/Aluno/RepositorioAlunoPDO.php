<?php

namespace Cezarcastrorosa\Curso015\Infra\Aluno;

use Cezarcastrorosa\Curso015\Dominio\Aluno\{Aluno, CPF, FabricaAluno, RepositorioAluno};
use Exception;
use PDO;

class RepositorioAlunoPDO implements RepositorioAluno
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function adicionar(Aluno $aluno): void
    {
        $sql = "INSERT INTO alunos VALUES (:cpf, :nome, :email);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue("cpf", $aluno->cpf());
        $statement->bindValue("nome", $aluno->nome());
        $statement->bindValue("email", $aluno->email());
        $statement->execute();

        $sql = "INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue("cpf_aluno", $aluno->cpf());

        foreach ($aluno->telefones() as $telefone) {
            $statement->bindValue("ddd", $telefone->ddd());
            $statement->bindValue("numero", $telefone->numero());
            $statement->execute();
        }
    }

    /**
     * @throws Exception
     */
    public function buscaPorCPF(CPF $cpf): Aluno
    {
        $sql = "
        SELECT 
            cpf, nome, email, ddd, numero as numero_telefone
        FROM 
            alunos LEFT JOIN 
            telefones ON alunos.cpf = telefones.cpf_aluno
        WHERE
            alunos.cpf = ?;
        ";

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, (string) $cpf);
        $statement->execute();

        $dadosAluno = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($dadosAluno) === 0) {
            throw new Exception("Aluno com este CPF não encontrado.");
        }

        return $this->mapearAluno($dadosAluno);
    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::comCPFEmailENome(
            $primeiraLinha['cpf'],
            $primeiraLinha['email'],
            $primeiraLinha['nome']
        );

        $telefones = array_filter(
            $dadosAluno,
            fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null
        );
        foreach ($telefones as $telefone) {
            $aluno->adicionaTelefone($telefone['ddd'], $telefone['numero_telefone']);
        }

        return $aluno;
    }
}
