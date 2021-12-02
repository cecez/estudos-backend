const ContentTypeNaoSuportado = require("./erros/ContentTypeNaoSuportado")

class Serializador 
{
    serializar (dados) 
    {
        if (this.contentType === 'application/json') {
            return this.json(dados)
        }

        throw new ContentTypeNaoSuportado(this.contentType)
    }

    json(dados)
    {
        return JSON.stringify(dados)
    }
}

module.exports = {
    Serializador,
    formatosAceitos: [
        'application/json'
    ]
}