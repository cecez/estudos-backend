const { AlunosService } = require('../services')
const alunosService = new AlunosService()
const FormRequesAlunosCreate = require('../form-requests/alunos/FormRequestAlunosCreate')

class AlunosController
{
    static async index(req, res)
    {
        try {
            const todosAlunos = await alunosService.pegaTodosOsRegistros()
            res.status(200).json(todosAlunos)
        } catch (erro) {
            res.status(500).json(erro.message)
        }
    }

    static async create(requisicao, resposta)
    {
        try {
            const alunoCriado = await alunosService.criaRegistro(new FormRequesAlunosCreate(requisicao))
            resposta.status(200).json(alunoCriado)
        } catch (erro) {
            resposta.status(500).json(erro.message)
        }
    }

}

module.exports = AlunosController