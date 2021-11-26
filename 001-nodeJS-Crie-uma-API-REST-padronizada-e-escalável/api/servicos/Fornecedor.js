const modeloFornecedor = require('../modelos/Fornecedores')

module.exports = 
{
    atualizar(id, dados) {
        return modeloFornecedor.update(dados, { where: { id }} )
    },

    inserir(novoFornecedor) {
        return modeloFornecedor.create(novoFornecedor)
    },

    listar() {
        return modeloFornecedor.findAll()
    },

    async pegarPorId(id) {
        const resultado = await modeloFornecedor.findOne({ where: { id } })

        if (!resultado) {
            throw new Error('Fornecedor não encontrado')
        }

        return resultado
    },

    remover(id) {
        return modeloFornecedor.destroy({ where: { id }})
    }
}