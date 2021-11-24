const roteador = require('express').Router()
const servico = require('../../servicos/Fornecedor')
const Fornecedor = require('../../entidades/Fornecedor')

roteador.get('/', async (requisicao, resposta) => {
    const resultados = await servico.listar()
    resposta.send(
        JSON.stringify(resultados)
    )
})

roteador.post('/', async (requisicao, resposta) => {
    const dadosRecebidos = requisicao.body
    const novoFornecedor = new Fornecedor(dadosRecebidos)
    await novoFornecedor.criar()
    resposta.send(JSON.stringify(novoFornecedor))
})

module.exports = roteador