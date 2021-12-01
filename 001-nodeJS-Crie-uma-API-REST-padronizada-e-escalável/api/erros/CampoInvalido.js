class CampoInvalido extends Error {
    constructor(campo) {
        this.codigoDeStatus = 400

        const mensagem = 'O campo ' + campo + ' está inválido.'
        super(mensagem)
    }
}

module.exports = CampoInvalido