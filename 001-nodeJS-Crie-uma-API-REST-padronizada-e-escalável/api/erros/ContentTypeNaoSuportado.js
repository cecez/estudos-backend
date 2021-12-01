class ContentTypeNaoSuportado extends Error {
    constructor(contentType) {
        this.codigoDeStatus = 406

        super('Content-Type não suportado. Valor recebido: ' + contentType + '. Valores aceitos: application/json')
    }
}

module.exports = ContentTypeNaoSuportado