const modeloFornecedor = require('../modelos/Fornecedores')
const NaoEncontrado = require('../erros/NaoEncontrado')

module.exports = 
{
    atualizar(id, dados) {
        return modeloFornecedor.update(dados, { where: { id }} )
    },

    inserir(novoFornecedor) {
        return modeloFornecedor.create(novoFornecedor)
    },

    listar() {
        return modeloFornecedor.findAll({ raw: true })
    },

    async pegarPorId(id) {
        const resultado = await modeloFornecedor.findOne({ where: { id } })

        if (!resultado) {
            throw new NaoEncontrado('Fornecedor não encontrado.')
        }

        return resultado
    },

    remover(id) {
        return modeloFornecedor.destroy({ where: { id }})
    }
}