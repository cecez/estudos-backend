class FormRequestAlunosCreate
{
    constructor(requisicao)
    {
        // validações
        // nome 1-255
        if (
            typeof requisicao.body.nome !== 'string' || 
            requisicao.body.nome.length === 0 || 
            requisicao.body.nome.length > 255
        ) {
            throw new Error("Campo 'nome' inválido.")
        }

        // email 1-255
        if (
            typeof requisicao.body.email !== 'string' || 
            requisicao.body.email.length === 0 || 
            requisicao.body.email.length > 255
        ) {
            throw new Error("Campo 'email' inválido.")
        }

        // cpf /d 11
        if (
            typeof requisicao.body.cpf !== 'string' || 
            requisicao.body.cpf.length != 11 
        ) {
            throw new Error("Campo 'cpf' inválido.")
        }

        // data de nascimento yyyy-mm-dd
        if (
            typeof requisicao.body.dataDeNascimento !== 'string' || 
            Number.isNaN(Date.parse(requisicao.body.dataDeNascimento))  // alguns casos passam, p. ex "2020-02-31"
        ) {
            throw new Error("Campo 'dataDeNascimento' inválido.")
        }

        // validações ok
        this.nome = requisicao.body.nome
        this.email = requisicao.body.email
        this.cpf = requisicao.body.cpf
        this.dataDeNascimento = requisicao.body.dataDeNascimento
    }
}

module.exports = FormRequestAlunosCreate