const roteador = require('express').Router()
const servico = require('../../servicos/Fornecedor')
const Fornecedor = require('../../entidades/Fornecedor')
const SerializadorFornecedor = require('../../Serializador').SerializadorFornecedor

roteador.delete('/:idFornecedor', async (requisicao, resposta, proximoMiddleware) => {
    try {
        const idFornecedor = requisicao.params.idFornecedor
        const fornecedor = new Fornecedor({ id: idFornecedor })
        await fornecedor.carregar()
        await fornecedor.remover()
        resposta.status(204)
        resposta.send()
    } catch (erro) {
        proximoMiddleware(erro)
    }
})

roteador.get('/', async (requisicao, resposta) => {
    const resultados = await servico.listar()
    resposta.status(200)
    const serializador = new SerializadorFornecedor(resposta.getHeader('Content-Type'))
    resposta.send(serializador.serializar(resultados))
})

roteador.get('/:idFornecedor', async (requisicao, resposta, proximoMiddleware) => {
    try {
        const idFornecedor = requisicao.params.idFornecedor
        const fornecedor = new Fornecedor({ id: idFornecedor})
        await fornecedor.carregar()
        resposta.status(200)
        const serializador = new SerializadorFornecedor(resposta.getHeader('Content-Type'), ['email', 'dataCriacao'])
        resposta.send(serializador.serializar(fornecedor))
    } catch (erro) {
        proximoMiddleware(erro)
    }
    
})

roteador.post('/', async (requisicao, resposta, proximoMiddleware) => {
    try {
        const dadosRecebidos = requisicao.body
        const novoFornecedor = new Fornecedor(dadosRecebidos)
        await novoFornecedor.criar()
        resposta.status(201)
        const serializador = new SerializadorFornecedor(resposta.getHeader('Content-Type'))
        resposta.send(serializador.serializar(novoFornecedor))
    } catch (erro) {
        proximoMiddleware(erro)
    }
})

roteador.put('/:idFornecedor', async (requisicao, resposta, proximoMiddleware) => {
    try {
        const id = requisicao.params.idFornecedor
        const dadosRecebidos = requisicao.body
        const dadosMesclados = Object.assign({}, dadosRecebidos, { id })
        const fornecedor = new Fornecedor(dadosMesclados)
        await fornecedor.atualizar()
        resposta.status(204)
        resposta.end()
    } catch (erro) {
        proximoMiddleware(erro)
    }
    
})

module.exports = roteador