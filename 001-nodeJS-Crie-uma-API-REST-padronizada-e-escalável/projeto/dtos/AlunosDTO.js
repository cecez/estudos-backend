class AlunosDTO {

    constructor(aluno)
    {
        this.nomeDoAluno = aluno.nome
        this.dataDeNascimentoDoAluno = aluno.dataDeNascimento
    }

    static alunoCriado(aluno) {
        return {
            "idDoAluno": aluno.id,
            "cpfDoAluno": aluno.cpf,
            "emailDoAluno": aluno.email,
            "nomeDoAluno": aluno.nome,
            "dataDeNascimentoDoAluno": new Date(aluno.dataDeNascimento).toLocaleDateString('pt-br'),
            "dataDeCriacaoDoAluno": new Date(aluno.createdAt).toLocaleString('pt-br')
        }
    }

}

module.exports = AlunosDTO