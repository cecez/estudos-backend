class FormRequestAlunosCreate
{
    constructor(requisicao)
    {
        // validações
        // nome 1-255
        // email 1-255
        // cpf /d 11
        // data de nascimento yyyy-mm-dd
        console.log(requisicao.body)

        this.nome = requisicao.body.nome
        this.email = requisicao.body.email
        this.cpf = requisicao.body.cpf
        this.dataDeNascimento = requisicao.body.dataDeNascimento
    }
}

module.exports = FormRequestAlunosCreate