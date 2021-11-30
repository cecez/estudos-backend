class Erro extends Error 
{
    constructor(mensagem) {
        super(mensagem)

        this.codigoDeStatus = 400
    }

}

module.exports = Erro