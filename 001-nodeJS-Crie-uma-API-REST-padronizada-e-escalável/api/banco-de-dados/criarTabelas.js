const modeloFornecedor = require('../modelos/Fornecedores')

modeloFornecedor
    .sync()
    .then(() => console.log('Tabela fornecedores syncada com sucesso'))
    .catch(console.log)