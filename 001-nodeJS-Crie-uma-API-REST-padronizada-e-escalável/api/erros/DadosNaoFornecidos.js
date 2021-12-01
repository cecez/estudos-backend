class DadosNaoFornecidos extends Error {
    constructor() {
        this.codigoDeStatus = 400

        super('Não há dados para atualizar o fornecedor')
    }
}

module.exports = DadosNaoFornecidos