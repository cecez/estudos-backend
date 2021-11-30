const express = require('express')
const app = express()
const bodyParser = require('body-parser')
const config = require('config')

app.use(bodyParser.json())

const roteador = require('./rotas/fornecedores')
app.use('/api/fornecedores', roteador)

// (último) middleware para processar e entregar requisições com erro
app.use((erro, requisicao, resposta, proximoMiddleware) => {
    resposta.status(erro.codigoDeStatus)
    resposta.send(JSON.stringify({ mensagem: erro.message }))
})

app.listen(config.get('api.porta'), () => console.log('API rodando na porta ' + config.get('api.porta') + '...'))