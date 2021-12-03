const ContentTypeNaoSuportado = require("./erros/ContentTypeNaoSuportado")

class Serializador 
{
    serializar (dados) 
    {
        if (this.contentType === 'application/json') {
            return this.json(
                this.filtrar(dados)
            )
        }

        throw new ContentTypeNaoSuportado(this.contentType)
    }

    json(dados)
    {
        return JSON.stringify(dados)
    }

    filtrar(dados)
    {
        if (Array.isArray(dados)) {
            return dados.map(item => { return this.filtrarObjeto(item) })
        } else {
            return this.filtrarObjeto(dados)
        }
    }

    filtrarObjeto(dados)
    {
        const novoObjeto = {}

        this.camposPublicos.forEach((campo) => {
            if (dados.hasOwnProperty(campo)) {
                novoObjeto[campo] = dados[campo]
            }
        })

        return novoObjeto
    }

}

class SerializadorFornecedor extends Serializador
{
    constructor(contentType) 
    {
        super()
        this.contentType = contentType
        this.camposPublicos = ['id', 'empresa', 'categoria']
    }
}

module.exports = {
    Serializador,
    SerializadorFornecedor,
    formatosAceitos: [
        'application/json'
    ]
}