const express = require('express')
const app = express()
const bodyParser = require('body-parser')
const config = require('config')
const formatosAceitos = require('./Serializador').formatosAceitos

app.use(bodyParser.json())

// middleware para verificar se api aceita conteúdo esperado
app.use((requisicao, resposta, proximo) => {
    let formatoRequisitado = requisicao.header('Accept')

    if (formatoRequisitado === '*/*') {
        formatoRequisitado = 'application/json'
    }

    if (formatosAceitos.indexOf(formatoRequisitado) === -1) {
        resposta.status(406)
        resposta.end('Formato requisitado não suportado. Aceita-se application/json.')
        return
    }

    resposta.setHeader('Content-Type', formatoRequisitado)
    proximo()
})

const roteador = require('./rotas/fornecedores')
app.use('/api/fornecedores', roteador)

// (último) middleware para processar e entregar requisições com erro
app.use((erro, requisicao, resposta, proximoMiddleware) => {
    resposta.status(erro.codigoDeStatus)
    resposta.send(JSON.stringify({ mensagem: erro.message }))
})

app.listen(config.get('api.porta'), () => console.log('API rodando na porta ' + config.get('api.porta') + '...'))