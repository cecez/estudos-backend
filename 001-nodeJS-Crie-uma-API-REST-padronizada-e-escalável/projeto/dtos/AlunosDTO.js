class AlunosDTO {

    constructor(aluno)
    {
        this.nomeDoAluno = aluno.nome
        this.dataDeNascimentoDoAluno = aluno.dataDeNascimento
    }

    static alunoCriado(aluno) {
        return {
            "id": aluno.id,
            "nomeDoAluno": aluno.nome,
            "dataDeNascimentoDoAluno": aluno.dataDeNascimento,
            "dataDeCriacaoDoAluno": aluno.createdAt
        }
    }

}

module.exports = AlunosDTO