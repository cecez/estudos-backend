const database = require('../models');

class AlunosController
{
    static async index(req, res)
    {
        try {
            const todosAlunos = await database['Alunos'].findAll();
            res.status(200).json(todosAlunos);
        } catch (erro) {
            res.status(500).json(erro.message);
        }
    }

}

module.exports = AlunosController