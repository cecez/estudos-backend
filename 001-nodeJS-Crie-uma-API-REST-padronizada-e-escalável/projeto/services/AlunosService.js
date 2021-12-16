const AlunoRepository = require('../repositories/AlunoRepository')
const AlunoDTO = require('../dtos/AlunosDTO')

class AlunosService {

    constructor() {
        this.alunoRepository = new AlunoRepository();
    }

    async pegaTodosOsRegistros() {
        const resultados = await this.alunoRepository.buscaTodos();

        const resultadosDTO = resultados.map(
            function (aluno) { 
                return new AlunoDTO(
                    aluno.nome, 
                    aluno.dataDeNascimento
                )  
            }
        )

        return resultadosDTO
    }

}

module.exports = AlunosService;