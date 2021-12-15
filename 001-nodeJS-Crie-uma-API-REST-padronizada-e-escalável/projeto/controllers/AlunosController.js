const { AlunosService } = require('../services');
const alunosService = new AlunosService();

class AlunosController
{
    static async index(req, res)
    {
        try {
            const todosAlunos = await alunosService.pegaTodosOsRegistros();
            res.status(200).json(todosAlunos);
        } catch (erro) {
            res.status(500).json(erro.message);
        }
    }

}

module.exports = AlunosController