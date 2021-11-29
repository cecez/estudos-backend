const roteador = require('express').Router()
const servico = require('../../servicos/Fornecedor')
const Fornecedor = require('../../entidades/Fornecedor')

roteador.delete('/:idFornecedor', async (requisicao, resposta) => {
    try {
        const idFornecedor = requisicao.params.idFornecedor
        const fornecedor = new Fornecedor({ id: idFornecedor })
        await fornecedor.carregar()
        await fornecedor.remover()
        resposta.status(204)
        resposta.send()
    } catch (erro) {
        resposta.status(404)
        resposta.send(JSON.stringify({ mensagem: erro.message }))
    }
})

roteador.get('/', async (requisicao, resposta) => {
    const resultados = await servico.listar()
    resposta.status(200)
    resposta.send(
        JSON.stringify(resultados)
    )
})

roteador.get('/:idFornecedor', async (requisicao, resposta) => {
    try {
        const idFornecedor = requisicao.params.idFornecedor
        const fornecedor = new Fornecedor({ id: idFornecedor})
        await fornecedor.carregar()
        resposta.status(200)
        resposta.send(JSON.stringify(fornecedor))
    } catch (erro) {
        resposta.status(404)
        resposta.send(JSON.stringify({  mensagem: erro.message }))
    }
    
})

roteador.post('/', async (requisicao, resposta) => {
    try {
        const dadosRecebidos = requisicao.body
        const novoFornecedor = new Fornecedor(dadosRecebidos)
        await novoFornecedor.criar()
        resposta.status(201)
        resposta.send(JSON.stringify(novoFornecedor))
    } catch (erro) {
        resposta.status(400)
        resposta.send(JSON.stringify({ mensagem: erro.message }))
    }
})

roteador.put('/:idFornecedor', async (requisicao, resposta) => {
    try {
        const id = requisicao.params.idFornecedor
        const dadosRecebidos = requisicao.body
        const dadosMesclados = Object.assign({}, dadosRecebidos, { id })
        const fornecedor = new Fornecedor(dadosMesclados)
        await fornecedor.atualizar()
        resposta.status(204)
        resposta.end()
    } catch (erro) {
        var codigoDeStatus = 400

        if (String(erro.message).includes('não encontrado')) {
            codigoDeStatus = 404
        }

        resposta.status(codigoDeStatus)
        resposta.send(JSON.stringify({ mensagem: erro.message }))
    }
    
})

module.exports = roteador