const modeloFornecedor = require('../modelos/Fornecedores')

module.exports = {
    listar() {
        return modeloFornecedor.findAll()
    },

    inserir(novoFornecedor) {
        return modeloFornecedor.create(novoFornecedor)
    }
}