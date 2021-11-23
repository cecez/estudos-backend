const modeloFornecedor = require('../modelos/Fornecedores')

module.exports = {
    listar() {
        return modeloFornecedor.findAll()
    }
}