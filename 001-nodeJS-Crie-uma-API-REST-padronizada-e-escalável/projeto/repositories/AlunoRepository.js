const database = require('../models');

class AlunoRepository
{
    constructor()
    {
        this.nomeDoModelo = 'Alunos'
    }

    async buscaTodos()
    {
        return database[this.nomeDoModelo].findAll()
    }

    async cria(dados)
    {
        return database[this.nomeDoModelo].create(dados)
    }
}

module.exports = AlunoRepository