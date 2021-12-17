const AlunoRepository = require('../repositories/AlunoRepository')
const AlunoDTO = require('../dtos/AlunosDTO')

class AlunosService {

    constructor() 
    {
        this.alunoRepository = new AlunoRepository();
    }

    async pegaTodosOsRegistros() 
    {
        const resultados = await this.alunoRepository.buscaTodos();

        const resultadosDTO = resultados.map(
             (aluno) => new AlunoDTO(aluno)    
        )

        return resultadosDTO
    }

    async criaRegistro(dados)
    {
        const resultado = await this.alunoRepository.cria(dados);

        const resultadoDTO = AlunoDTO.alunoCriado(resultado)

        return resultadoDTO
    }

}

module.exports = AlunosService;