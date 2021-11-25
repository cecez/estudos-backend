const { ne } = require('sequelize/dist/lib/operators')
const servicoFornecedor = require('../servicos/Fornecedor')

class Fornecedor {
    constructor({id, empresa, email, categoria, dataCriacao, dataAtualizacao, versao}) {
        this.id = id
        this.empresa = empresa
        this.email = email
        this.categoria = categoria
        this.dataCriacao = dataCriacao
        this.dataAtualizadao = dataAtualizacao
        this.versao = versao
    }

    async atualizar() {
        await servicoFornecedor.pegarPorId(this.id)
        const camposAtualizaveis = ['empresa', 'email', 'categoria']
        const dadosParaAtualizar = {}

        camposAtualizaveis.forEach((campo) => {
            const valor = this[campo]

            if (typeof valor === 'string' && valor.length > 0) {
                dadosParaAtualizar[campo] = valor
            }
        })

        if (Object.keys(dadosParaAtualizar).length === 0) {
            throw new Error('Não há dados para atualizar o fornecedor')
        }

        await servicoFornecedor.atualizar(this.id, dadosParaAtualizar)
    }

    async carregar() {
        const resultado = await servicoFornecedor.pegarPorId(this.id)
        
        this.empresa = resultado.empresa
        this.email = resultado.email
        this.categoria = resultado.categoria
        this.dataCriacao = resultado.dataCriacao
        this.dataAtualizacao = resultado.dataAtualizacao
        this.versao = resultado.versao
    }

    async criar() {
        const resultado = await servicoFornecedor.inserir({
            empresa: this.empresa,
            email: this.email,
            categoria: this.categoria
        })

        this.id = resultado.id
        this.dataCriacao = resultado.dataCriacao
        this.dataAtualizacao = resultado.dataAtualizacao
        this.versao = resultado.versao
    }
}

module.exports = Fornecedor