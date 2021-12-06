const ContentTypeNaoSuportado = require("./erros/ContentTypeNaoSuportado")
const jsontoxml = require('jsontoxml')

class Serializador 
{
    serializar (dados) 
    {
        dados = this.filtrar(dados)

        if (this.contentType === 'application/json') {
            return this.json(dados)
        } else if (this.contentType === 'application/xml') {
            return this.xml(dados)
        }

        throw new ContentTypeNaoSuportado(this.contentType)
    }

    json(dados)
    {
        return JSON.stringify(dados)
    }

    xml(dados)
    {
        let tag = this.tagSingular
        if (Array.isArray(dados)) {
            tag = this.tagPlural
            dados = dados.map((item) => { return { [this.tagSingular]: item } })
        }

        return jsontoxml({ [tag]: dados })
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
    constructor(contentType, camposExtras) 
    {
        super()
        this.contentType = contentType
        this.camposPublicos = ['id', 'empresa', 'categoria'].concat(camposExtras || [])
        this.tagSingular = 'fornecedor'
        this.tagPlural = 'fornecedores'
    }
}

class SerializadorErro extends Serializador
{
    constructor(contentType, camposExtras)
    {
        super()
        this.contentType = contentType
        this.camposPublicos = ['mensagem'].concat(camposExtras || [])
        this.tagSingular = 'erro'
        this.tagPlural = 'erros'
    }
}

module.exports = {
    Serializador,
    SerializadorFornecedor,
    SerializadorErro,
    formatosAceitos: [
        'application/json', 'application/xml'
    ]
}