const Service = require('./Service');

class AlunosService extends Service {

    constructor() {
        super('Alunos');
    }

    // async pegaTodosOsRegistros(where = {}) {
    //     return database[this.nomeDoModelo].scope('todas').findAll({ where: { ...where } });
    // }

}

module.exports = AlunosService;