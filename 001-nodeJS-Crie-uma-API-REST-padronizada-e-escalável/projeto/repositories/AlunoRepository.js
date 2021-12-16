const database = require('../models');

class AlunoRepository
{
    constructor()
    {
        this.nomeDoModelo = 'Alunos'
    }

    async buscaTodos()
    {
        return database[this.nomeDoModelo].findAll();
    }
}

module.exports = AlunoRepository