const roteador = require('express').Router()
const servico = require('../../servicos/Fornecedor')

roteador.use('/', async (requisicao, resposta) => {
    const resultados = await servico.listar()
    resposta.send(
        JSON.stringify(resultados)
    )
})

module.exports = roteador