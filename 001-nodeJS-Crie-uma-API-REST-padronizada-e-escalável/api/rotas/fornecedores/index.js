const roteador = require('express').Router()
const servico = require('../../servicos/Fornecedor')
const Fornecedor = require('../../entidades/Fornecedor')

roteador.get('/', async (requisicao, resposta) => {
    const resultados = await servico.listar()
    resposta.send(
        JSON.stringify(resultados)
    )
})

roteador.get('/:idFornecedor', async (requisicao, resposta) => {
    try {
        const idFornecedor = requisicao.params.idFornecedor
        const fornecedor = new Fornecedor({ id: idFornecedor})
        await fornecedor.carregar()
        resposta.send(JSON.stringify(fornecedor))
    } catch (erro) {
        resposta.send(JSON.stringify({
            mensagem: erro.message
        }))
    }
    
})

roteador.post('/', async (requisicao, resposta) => {
    const dadosRecebidos = requisicao.body
    const novoFornecedor = new Fornecedor(dadosRecebidos)
    await novoFornecedor.criar()
    resposta.send(JSON.stringify(novoFornecedor))
})

roteador.put('/:idFornecedor', async (requisicao, resposta) => {
    try {
        const id = requisicao.params.idFornecedor
        const dadosRecebidos = requisicao.body
        const dadosMesclados = Object.assign({}, dadosRecebidos, { id })
        const fornecedor = new Fornecedor(dadosMesclados)
        await fornecedor.atualizar()
        resposta.end()
    } catch (erro) {
        resposta.send(JSON.stringify({ mensagem: erro.message }))
    }
    
})

module.exports = roteador