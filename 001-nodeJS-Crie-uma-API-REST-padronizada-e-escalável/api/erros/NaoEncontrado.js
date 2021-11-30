class NaoEncontrado extends Error 
{
    constructor(mensagem) {
        super(mensagem)

        this.codigoDeStatus = 404
    }

}

module.exports = NaoEncontrado